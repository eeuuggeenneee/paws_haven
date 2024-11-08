@extends('layouts.app')

@section('content')
 @livewire('fur-community')
 @livewire('modals-dogs')
 @livewire('notification')

 <script>
          function appendNewComment(comment,post_id) {
        
            const newCommentHtml = `
                <div class="d-flex">
                    <img class="me-2 mt-1 rounded" src="/storage/${comment.profile_path}" alt="Generic placeholder image" height="32">
                    <div class="w-100">
                        <div class="d-flex">
                            <h5 class="m-0"> ${comment.name} </h5>
                            <a onclick="addflex('${comment.comment_unique_id}')" class="btn btn-sm btn-link text-muted p-0 ps-2">
                                    <i class='uil uil-comments-alt me-1'></i> Reply
                                </a>
                        </div>
                        <p class="text-muted mb-0">
                            <small>just now</small>
                        </p>
                        <p class="my-1">${comment.messages}</p>
                        <div id="appendhere-${comment.comment_unique_id}">
                        </div> 
                        <div id="reply-${comment.comment_unique_id}">
                        </div>
                    </div>
                </div>
            `;
            document.getElementById('appendhere-'+post_id ).insertAdjacentHTML('beforeend', newCommentHtml);
        }
        function appendNewReply(reply,comment_id) {
            console.log(reply,comment_id);
            const newReplyHtml = `
                <div class="d-flex mb-1">
                    <img class="me-2 mt-1 rounded" src="/storage/${reply.profile_path}" alt="Generic placeholder image" height="32">
                    <div>
                        <h5 class="m-0">${reply.name}</h5>
                        <p class="text-muted mb-0">
                            <small>just now</small>
                        </p>
                        <p class="">${reply.messages}</p>
                    </div>
                </div>
            `;
            // Append the new reply to the element with id 'appendhere-reply'
            document.getElementById('appendhere-' + comment_id).insertAdjacentHTML('beforeend', newReplyHtml);
        }
 </script>
@endsection
