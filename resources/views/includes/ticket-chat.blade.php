<div class="chats">
    @foreach($ticket->chats as $chat)
        <div class="chat @if($chat->user->id == auth()->user()->id) chat-left @else chat-right @endif">
            <div class="chat-avatar">
                <a href="profile.html" class="avatar">
                    <img src="{{ $chat->user->profile_pic_url }}" alt="{{ $chat->user->full_name }}">
                </a>
            </div>
            <div class="chat-body">
                <div class="chat-bubble">
                    <div class="chat-content">
                        <span class="task-chat-user">{{ $chat->user->full_name }}</span>
                        <span class="chat-time">{{ $chat->created_at->diffForHumans() }}</span>
                        <p>{{ $chat->message }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if($chat->message == 'Ticket Closed')
            <div class="completed-task-msg">
                <span class="task-success">
                    <a href="#">{{ $chat->user->full_name }}</a> closed this ticket.
                </span>
                <span class="task-time">{{ $chat->created_at->diffForHumans() }}</span>
            </div>
        @endif
        
        @if($chat->message == 'Ticket Reopened')
        <div class="task-information">
            <span class="task-info-line">
                <a class="task-user" href="#">{{ $chat->user->full_name }}</a>
                <span class="task-info-subject">marked ticket as reopened</span>
            </span>
            <div class="task-time">{{ $chat->created_at->diffForHumans() }}</div>
        </div>
        @endif
    @endforeach
</div>