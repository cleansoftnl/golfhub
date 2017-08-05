<?php
namespace Phphub\Handler;

use App\Models\User;
use App\Models\Staff;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\Mention;
use App\Models\Append;
use App\Models\NotificationMailLog;
use Illuminate\Mail\Message;
use Mail;
use Naux\Mail\SendCloudTemplate;
use Jrean\UserVerification\Facades\UserVerification;

class EmailHandler
{
    protected $methodMap = [
        // 只有需要user处理 of 信息，才有必要发送邮件
        'at' => 'sendAtNotifyMail',
        'mentioned_in_topic' => 'sendMentionedInTopicNotifyMail',
        'attention' => 'sendAttentionNotifyMail',
        'vote_append' => 'sendVoteAppendNotifyMail',
        'comment_append' => 'sendCommentAppendNotifyMail',
        'attented_append' => 'sendAttendAppendNotifyMail',
        'new_reply' => 'sendNewReplyNotifyMail',
        'new_message' => 'sendNewMessageNotifyMail',
        // under面动作只是「信息 of 知悉」，无需发送邮件，系统通知即可（删除保持精简）
        // 'follow'               => 'sendFollowNotifyMail',
        // 'reply_upvote'         => 'sendReplyUpvoteNotifyMail',
        // 'topic_attent'         => 'sendTopicAttentNotifyMail',
        // 'topic_mark_excellent' => 'sendTopicMarkExcellentNotifyMail',
        // 'topic_upvote'         => 'sendTopicUpvoteNotifyMail',
        // 'new_topic_from_subscribe'
        // 'new_topic_from_following'
    ];

    protected $type;
    protected $fromUser;
    protected $toUser;
    protected $topic;
    protected $reply;
    protected $body;

    public function sendMaintainerWorksMail(Staff $user, $timeFrame, $content)
    {
        Mail::send('emails.fake', [], function (Message $message) use ($user, $timeFrame, $content) {
            $message->subject('operation员工作统计');
            $message->getSwiftMessage()->setBody(new SendCloudTemplate('maintainer_works', [
                'name' => $user->name,
                'time_frame' => $timeFrame,
                'content' => $content,
            ]));
            $message->to($user->email);
        });
    }

    public function sendActivateMail(Staff $user)
    {
        UserVerification::generate($user);
        $token = $user->verification_token;
        Mail::send('emails.fake', [], function (Message $message) use ($user, $token) {
            $message->subject(lang('Please verify your email address'));
            $message->getSwiftMessage()->setBody(new SendCloudTemplate('template_active', [
                'name' => $user->name,
                'url' => url('verification', $user->verification_token) . '?email=' . urlencode($user->email),
            ]));
            $message->to($user->email);
        });
    }

    public function sendNotifyMail($type, User $fromUser, User $toUser, Topic $topic = null, Reply $reply = null, $body = null)
    {
        if (
            !isset($this->methodMap[$type])             // 不是运行 of 类型
            || $toUser->email_notify_enabled != 'yes'   // 没开启邮件通知
            || $toUser->id == $fromUser->id             // 发件和收件是同一个人
            || !$toUser->email                          // 不存在邮件
            || $toUser->verified != 1                   // 还未验证
            || $this->_checkNecessary($type, $toUser)   // 因延迟触发 of ，user可能已读过站内通知
        ) {
            return false;
        }
        $this->topic = $topic;
        $this->reply = $reply;
        $this->body = $body;
        $this->fromUser = $fromUser;
        $this->toUser = $toUser;
        $this->type = $type;
        $method = $this->methodMap[$type];
        $this->$method();
    }

    protected function sendNewMessageNotifyMail()
    {
        if (!$this->body)
            return false;
        $action = " 发 the 一条私信给你。内容如under：<br />";
        $this->_send(null, $this->fromUser, '你有新 of 私信', $action, $this->body, $this->body);
    }

    protected function sendNewReplyNotifyMail()
    {
        if (!$this->reply)
            return false;
        $action = " replies the 你 of 主题: <a href='" . $this->reply->topic->link() . "' target='_blank'>{$this->reply->topic->title}</a><br /><br />内容如under：<br />";
        $this->_send($this->topic, $this->fromUser, '你 of 主题有新comment', $action, $this->reply->body, $this->reply->body);
    }

    protected function sendAtNotifyMail()
    {
        if (!$this->reply)
            return false;
        $action = " 在主题: <a href='" . $this->topic->link(['#reply' . $this->reply->id]) . "' target='_blank'>{$this->reply->topic->title}</a>  of comment中提及 the 你<br /><br />内容如under：<br />";
        $this->_send($this->topic, $this->fromUser, '有user在comment中提及你', $action, $this->reply->body, $this->reply->body);
    }

    protected function sendAttentionNotifyMail()
    {
        if (!$this->reply)
            return false;
        $action = " comment the 你of concern主题: <a href='" . $this->topic->link(['#reply' . $this->reply->id]) . "' target='_blank'>{$this->reply->topic->title}</a><br /><br />comment内容如under：<br />";
        $this->_send($this->topic, $this->fromUser, '有usercomment the 你of concern主题', $action, $this->reply->body, $this->reply->body);
    }

    protected function sendVoteAppendNotifyMail()
    {
        if (!$this->body || !$this->topic)
            return false;
        $action = " You oclock upvoted of topic: <a href='" . $this->topic->link() . "' target='_blank'>{$this->topic->title}</a> have new words<br /><br />Topic as follows：<br />";
        $this->_send($this->topic, '', 'You oclockupvoted of topichave new words', $action, $this->body, $this->body);
    }

    protected function sendCommentAppendNotifyMail()
    {
        if (!$this->body || !$this->topic)
            return false;
        $action = " 你comment过 of topic: <a href='" . $this->topic->link() . "' target='_blank'>{$this->topic->title}</a> have new words<br /><br />附言内容如under：<br />";
        $this->_send($this->topic, '', '你comment过 of topichave new words', $action, $this->body, $this->body);
    }

    protected function sendAttendAppendNotifyMail()
    {
        if (!$this->body || !$this->topic)
            return false;
        $action = " 你of concerntopic: <a href='" . $this->topic->link() . "' target='_blank'>{$this->topic->title}</a> have new words<br /><br />附言内容如under：<br />";
        $this->_send($this->topic, '', '你of concerntopichave new words', $action, $this->body, $this->body);
    }

    protected function sendMentionedInTopicNotifyMail()
    {
        if (!$this->topic)
            return false;
        $action = " 在主题: <a href='" . $this->topic->link() . "' target='_blank'>{$this->topic->title}</a> 中提及 the 你。<br />";
        $this->_send($this->topic, $this->fromUser, '有user在主题中提及你', $action, '', '');
    }

    protected function generateMailLog($body = '')
    {
        $data = [];
        $data['from_user_id'] = $this->fromUser->id;
        $data['user_id'] = $this->toUser->id;
        $data['type'] = $this->type;
        $data['body'] = $body;
        $data['reply_id'] = $this->reply ? $this->reply->id : 0;
        $data['topic_id'] = $this->topic ? $this->topic->id : 0;
        NotificationMailLog::create($data);
    }

    private function _correctSubject($subject, Topic $topic)
    {
        if ($topic->isArticle()) {
            $subject = str_replace('主题', 'article', $subject);
            return str_replace('topic', 'article', $subject);
        }
        return $subject;
    }

    private function _correctAction($action, Topic $topic)
    {
        if ($topic->isArticle()) {
            $action = str_replace('topic', 'article', $action);
            $action = str_replace('主题', 'article', $action);
            $action = str_replace('topics', 'articles', $action);
        }
        return $action;
    }

    private function _send($topic, $user, $subject, $action, $content, $mailog = '')
    {
        $name = $user ? "<a href='" . url(route('users.show', $user->id)) . "' target='_blank'>{$user->name}</a>" : '';
        if ($topic) {
            $subject = $this->_correctAction($subject, $topic);
            $action = $this->_correctAction($action, $topic);
        }
        Mail::send('emails.fake', [], function (Message $message) use ($topic, $name, $subject, $action, $content, $mailog) {
            $message->subject($subject);
            $message->getSwiftMessage()->setBody(new SendCloudTemplate('notification_mail', [
                'name' => $name,
                'action' => $action,
                'content' => $content,
            ]));
            $message->to($this->toUser->email);
            $this->generateMailLog($mailog);
        });
    }

    private function _checkNecessary($type, User $toUser)
    {
        // 从数据库中重新读取user
        $user = User::find($toUser->id);
        // 私信，如果已读
        if ($type == 'new_message' && $user->message_count <= 0) {
            return true;
            // 通知，如果已读
        } elseif ($user->notification_count <= 0) {
            return true;
        }
        return false;
    }
}
