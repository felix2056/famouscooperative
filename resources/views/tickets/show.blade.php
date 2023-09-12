@extends('layouts.app')

@section('content')
<div class="chat-main-row">
    <div class="chat-main-wrapper">
        <div class="col-lg-8 message-view task-view">
            <div class="chat-window">
                <div class="fixed-header">
                    <div class="navbar">
                        <div class="float-start ticket-view-details">
                            <div class="ticket-header">
                                <span>Status: </span>
                                @if($ticket->status == 'open')
                                    <span class="badge badge-info">Open</span>
                                @elseif($ticket->status == 'reopened')
                                    <span class="badge badge-warning">Re-Opened</span>
                                @elseif($ticket->status == 'solved')
                                    <span class="badge badge-success">Solved</span>
                                @elseif($ticket->status == 'pending')
                                    <span class="badge badge-danger">Pending</span>
                                @endif
                                
                                <span class="m-l-15 text-muted">Client: </span>
                                <a href="{{ route('dashboard.clients.profile', ['slug' => $ticket->client->slug]) }}">{{ $ticket->client->full_name }}</a>
                                
                                <span class="m-l-15 text-muted">Created: </span>
                                <span>{{ $ticket->created_at->diffForHumans() }}</span>

                                <span class="m-l-15 text-muted">Created by:</span>
                                <span>{{ $ticket->employee->full_name }}</span>
                            </div>
                        </div>
                        <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
                    </div>
                </div>
                <div class="chat-contents">
                    <div class="chat-content-wrap">
                        <div class="chat-wrap-inner">
                            <div class="chat-box">
                                <div class="task-wrapper">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="project-title">
                                                <div class="m-b-20">
                                                    <span class="h5 card-title">{{ $ticket->title }}</span>
                                                    <div class="float-end ticket-priority">
                                                        <span>Priority:</span>
                                                        <div class="btn-group">
                                                            @if($ticket->priority == 'high')
                                                                <a href="#" class="badge badge-danger">High</a>
                                                            @elseif($ticket->priority == 'medium')
                                                                <a href="#" class="badge badge-warning">Medium</a>
                                                            @elseif($ticket->priority == 'low')
                                                                <a href="#" class="badge badge-info">Low</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>{{ $ticket->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="notification-popup hide">
                                    <p>
                                        <span class="task"></span>
                                        <span class="notification-text"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 message-view task-chat-view ticket-chat-view" id="task_window">
            <div class="chat-window">
                <div class="fixed-header">
                    <div class="navbar">
                        <div class="task-assign">
                            <span class="assign-title">Created by </span>
                            <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="John Doe" class="avatar">
                                <img src="{{ $ticket->employee->profile_pic_url }}" alt="{{ $ticket->employee->full_name }}">
                            </a>
                            {{-- <a href="#" class="followers-add" title="Add Assignee" data-bs-toggle="modal" data-bs-target="#assignee"><i class="material-icons">add</i></a> --}}
                        </div>
                        <ul class="nav float-end custom-menu">
                            <li class="nav-item dropdown dropdown-action">
                                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit_ticket">Edit Ticket</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_ticket">Delete Ticket</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="chat-contents task-chat-contents">
                    <div class="chat-content-wrap">
                        <div class="chat-wrap-inner">
                            <div class="chat-box">
                                <div class="chats">
                                    @foreach($ticket->chats as $chat)
                                        <div class="chat chat-left">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-footer">
                    <form action="{{ route('dashboard.tickets.send-message', $ticket->id) }}" method="POST">
                        @csrf
                        <div class="message-bar">
                            <div class="message-inner">
                                {{-- <a class="link attach-icon" href="#">
                                    <img src="images/attachment.png" alt="">
                                </a> --}}
                                <div class="message-area">
                                    <div class="input-group">
                                        <textarea class="form-control" placeholder="Type message..." name="message"></textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        @if($ticket->status != 'solved')
                                            <button class="btn btn-primary" type="submit">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="project-members task-followers">
                        <span class="followers-title">Followers</span>
                        @foreach($ticket->followers as $follower)
                            <a href="#" data-bs-toggle="tooltip" title="{{ $follower->full_name }}" class="avatar">
                                <img src="{{ $follower->profile_pic_url }}" alt="{{ $follower->full_name }}">
                            </a>
                        @endforeach
                        {{-- <a href="#" class="followers-add" data-bs-toggle="modal" data-bs-target="#task_followers"><i class="material-icons">add</i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Ticket Modal -->
<div id="edit_ticket" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Ticket</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('dashboard.tickets.update', $ticket->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Ticket Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $ticket->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Assign Client</label>
                                <select class="select @error('client') is-invalid @enderror" name="client">
                                    @foreach(\App\Models\User::where('role', 'client')->get() as $client)
                                        <option value="{{ $client->id }}" {{ $ticket->client_id == $client->id ? 'selected' : '' }}>{{ $client->full_name }}</option>
                                    @endforeach
                                </select>
                                @error('client')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Priority</label>
                                <select class="select @error('priority') is-invalid @enderror" name="priority">
                                    <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>High</option>
                                    <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low</option>
                                </select>
                                @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select @error('status') is-invalid @enderror" name="status">
                                    <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="reopened" {{ $ticket->status == 'reopened' ? 'selected' : '' }}>Re-opened</option>
                                    <option value="solved" {{ $ticket->status == 'solved' ? 'selected' : '' }}>Solved</option>
                                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $ticket->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Edit Ticket Modal -->

<!-- Delete Ticket Modal -->
<div id="delete_ticket" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete Ticket</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-6">
                            <a href="javascript:void(0);" class="btn btn-primary continue-btn" onclick="event.preventDefault(); document.getElementById('{{ 'delete-ticket-form-' . $ticket->id }}').submit();">Delete</a>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="d-none" id="{{ 'delete-ticket-form-' . $ticket->id }}" action="{{ route('dashboard.tickets.destroy', $ticket->id) }}" method="POST">
    @csrf
</form>
<!-- /Delete Ticket Modal -->

<div id="assignee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Assign to this task</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">�</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group m-b-30">
                    <input placeholder="Search to add" class="form-control search-input" type="text">
                    <button class="btn btn-primary">Search</button>
                </div>
                <div>
                    <ul class="chat-user-list">
                        <li>
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar">
                                        <img src="images/avatar-09.jpg" alt="">
                                    </span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Richard Miles</div>
                                        <span class="designation">Web Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar">
                                        <img src="images/avatar-10.jpg" alt="">
                                    </span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">John Smith</div>
                                        <span class="designation">Android Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar">
                                        <img src="images/avatar-10.jpg" alt="">
                                    </span>
                                    <div class="media-body align-self-center text-nowrap">
                                        <div class="user-name">Jeffery Lalor</div>
                                        <span class="designation">Team Leader</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Assign</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="task_followers" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add followers to this task</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">�</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group m-b-30">
                    <input placeholder="Search to add" class="form-control search-input" type="text">
                    <button class="btn btn-primary">Search</button>
                </div>
                <div>
                    <ul class="chat-user-list">
                        <li>
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar">
                                        <img src="images/avatar-10.jpg" alt="">
                                    </span>
                                    <div class="media-body media-middle text-nowrap">
                                        <div class="user-name">Jeffery Lalor</div>
                                        <span class="designation">Team Leader</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar">
                                        <img src="images/avatar-08.jpg" alt="">
                                    </span>
                                    <div class="media-body media-middle text-nowrap">
                                        <div class="user-name">Catherine Manseau</div>
                                        <span class="designation">Android Developer</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="media d-flex">
                                    <span class="avatar">
                                        <img src="images/avatar-11.jpg" alt="">
                                    </span>
                                    <div class="media-body media-middle text-nowrap">
                                        <div class="user-name">Wilmer Deluna</div>
                                        <span class="designation">Team Leader</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="submit-section">
                    <button class="btn btn-primary submit-btn">Add to Follow</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
