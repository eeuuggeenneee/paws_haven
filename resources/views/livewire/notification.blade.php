<div>
    <script>
        var notif_adoption = @json($notif_adoption);
        var notif_rounds = @json($notif_rounds);
        var notif_claims = @json($notif_claims);

        var notifications = @json($notifications);

        var connotif = document.getElementById('notification_here');
        console.log(notifications);
        var notif = [];

        function timeAgo(createdAt) {
            var now = new Date();
            var createdAtDate = new Date(createdAt);
            var diffInSeconds = Math.floor((now - createdAtDate) / 1000); // difference in seconds
            var diffInMinutes = Math.floor(diffInSeconds / 60); // difference in minutes
            var diffInHours = Math.floor(diffInMinutes / 60); // difference in hours
            var diffInDays = Math.floor(diffInHours / 24); // difference in days
            var diffInMonths = Math.floor(diffInDays / 30); // difference in months (approx)
            var diffInYears = Math.floor(diffInMonths / 12); // difference in years (approx)

            // Human-readable format based on the time difference
            if (diffInSeconds < 60) {
                return `${diffInSeconds} second${diffInSeconds !== 1 ? 's' : ''} ago`;
            } else if (diffInMinutes < 60) {
                return `${diffInMinutes} minute${diffInMinutes !== 1 ? 's' : ''} ago`;
            } else if (diffInHours < 24) {
                return `${diffInHours} hour${diffInHours !== 1 ? 's' : ''} ago`;
            } else if (diffInDays < 30) {
                return `${diffInDays} day${diffInDays !== 1 ? 's' : ''} ago`;
            } else if (diffInMonths < 12) {
                return `${diffInMonths} month${diffInMonths !== 1 ? 's' : ''} ago`;
            } else {
                return `${diffInYears} year${diffInYears !== 1 ? 's' : ''} ago`;
            }
        }

        notifications.forEach((element, index) => {
            var createdAt = new Date(element.created_at);
            var year = createdAt.getFullYear().toString().slice(-2);
            var month = (createdAt.getMonth() + 1).toString().padStart(2, '0');
            if (element.table_source == 'adoption') {
                var formattedDate = 'A' + year + '' + month;
            } else if (element.table_source == 'rounds') {
                var formattedDate = 'R' + year + '' + month;
            } else if (element.table_source == 'claims') {
                var formattedDate = 'C' + year + '' + month;
            }

            var myid = (element.id).toString().padStart(4, '0');
            var timeAgoText = timeAgo(element.created_at);
            var statusP = '';
            var statusText = '';

            if (element.status_name == 'For Adoption') {
                statusText = 'Please expect a call from the pound.';
                statusP = element.status_name;
            } else if (element.status_name == 'Pending Claim') {
                statusText = 'Please expect a call from the pound.';
                statusP = 'Pending Claim';
            } else {
                statusP = '';
                statusText = 'Lost Claim Rejected';
            }
            if (element.table_source == 'rounds') {
                if (element.is_approved == null) {
                    statusText = 'Please wait for the announcement';
                    statusP = 'Rounds Pending';
                } else if (element.is_approved == 1) {
                    statusText = 'Rounds Approved';
                    statusP = '';
                } else {
                    statusText = 'Rounds Rejected';
                    statusP = '';
                }
            }

            notif.push(`
                <a wire:key="${element.dog_id_unique}" href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="notify-icon bg-primary">
                                    <i class="mdi mdi-comment-account-outline"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 text-truncate ms-2">
                                <h5 class="noti-item-title fw-semibold font-14">Ticket #
                                    ${formattedDate}-${myid} <small class="fw-normal text-muted ms-1">${timeAgoText}</small>
                                </h5>
                                <small class="noti-item-subtitle text-muted">${statusText}</small>   <br>
                                <small class="noti-item-subtitle text-muted">${statusP}</small>
                            </div>
                        </div>
                    </div>
                </a>
            `);
        });
        // notif_adoption.forEach((element, index) => {

        //     var createdAt = new Date(element.created_at);

        //     var year = createdAt.getFullYear().toString().slice(-2);
        //     var month = (createdAt.getMonth() + 1).toString().padStart(2, '0');
        //     var formattedDate = 'A' + year + '' + month;

        //     var myid = (element.id).toString().padStart(4, '0');
        //     var timeAgoText = timeAgo(element.created_at);

        //     var statusText = '';
        //     if (element.status_name == 'For Adoption') {
        //         statusText = 'Please expect a call from the pound.';
        //     }
        //     notif.push(`
    //         <a wire:key="${element.dog_id_unique}" href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
    //             <div class="card-body">
    //                 <div class="d-flex align-items-center">
    //                     <div class="flex-shrink-0">
    //                         <div class="notify-icon bg-primary">
    //                             <i class="mdi mdi-comment-account-outline"></i>
    //                         </div>
    //                     </div>
    //                     <div class="flex-grow-1 text-truncate ms-2">
    //                         <h5 class="noti-item-title fw-semibold font-14">Ticket #
    //                             ${formattedDate}-${myid} <small class="fw-normal text-muted ms-1">${timeAgoText}</small>
    //                         </h5>
    //                         <small class="noti-item-subtitle text-muted">${statusText}</small>   <br>
    //                         <small class="noti-item-subtitle text-muted">${element.status_name}</small>
    //                     </div>
    //                 </div>
    //             </div>
    //         </a>
    //     `);
        // });
        // notif_rounds.forEach((element, index) => {

        //     var createdAt = new Date(element.created_at);

        //     var year = createdAt.getFullYear().toString().slice(-2);
        //     var month = (createdAt.getMonth() + 1).toString().padStart(2, '0');
        //     var formattedDate = 'R' + year + '' + month;

        //     var myid = (element.id).toString().padStart(4, '0');
        //     var timeAgoText = timeAgo(element.created_at);

        //     var statusText = '';
        //     var statusP = '';
        //     if (element.is_approved == null) {
        //         statusText = 'Please wait for the announcement';
        //         statusP = 'Rounds Pending';
        //     } else if (element.is_approved == 1) {
        //         statusText = 'Rounds Approved';
        //     } else {
        //         statusText = 'Rounds Rejected';
        //     }

        //     notif.push(`
    //                 <a wire:key="${element.dog_id_unique}" href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
    //                     <div class="card-body">
    //                         <div class="d-flex align-items-center">
    //                             <div class="flex-shrink-0">
    //                                 <div class="notify-icon bg-primary">
    //                                     <i class="mdi mdi-comment-account-outline"></i>
    //                                 </div>
    //                             </div>
    //                             <div class="flex-grow-1 text-truncate ms-2">
    //                                 <h5 class="noti-item-title fw-semibold font-14">Ticket #
    //                                     ${formattedDate}-${myid} <small class="fw-normal text-muted ms-1">${timeAgoText}</small>
    //                                 </h5>
    //                                 <small class="noti-item-subtitle text-muted">${statusText}</small>
    //                                 <br>
    //                                 <small class="noti-item-subtitle text-muted">${statusP}</small>
    //                             </div>
    //                         </div>
    //                     </div>
    //                 </a>
    //             `);
        // });
        // notif_claims.forEach((element, index) => {
        //     var createdAt = new Date(element.created_at);

        //     var year = createdAt.getFullYear().toString().slice(-2);
        //     var month = (createdAt.getMonth() + 1).toString().padStart(2, '0');
        //     var formattedDate = 'A' + year + '' + month;

        //     var myid = (element.id).toString().padStart(4, '0');
        //     var timeAgoText = timeAgo(element.created_at);

        //     var statusText = '';
        //     var statusP = '';
        //     if (element.status_name == 'Pending Claim') {
        //         statusText = 'Please expect a call from the pound.';
        //         statusP = 'Pending Claim';
        //     }else{
        //         statusP = '';
        //         statusText = 'Lost Claim Rejected';
        //     }
        //     notif.push(`
    //         <a wire:key="${element.dog_id_unique}" href="javascript:void(0);" class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
    //             <div class="card-body">

    //                 <div class="d-flex align-items-center">
    //                     <div class="flex-shrink-0">
    //                         <div class="notify-icon bg-primary">
    //                             <i class="mdi mdi-comment-account-outline"></i>
    //                         </div>
    //                     </div>
    //                     <div class="flex-grow-1 text-truncate ms-2">
    //                         <h5 class="noti-item-title fw-semibold font-14">Ticket #
    //                             ${formattedDate}-${myid} <small class="fw-normal text-muted ms-1">${timeAgoText}</small>
    //                         </h5>
    //                         <small class="noti-item-subtitle text-muted">${statusText}</small><br>
    //                         <small class="noti-item-subtitle text-muted">${statusP}</small>
    //                     </div>
    //                 </div>
    //             </div>
    //         </a>
    //     `);
        //     });



        // Once all notifications are collected, join them into a string and insert into the container
        connotif.innerHTML = notif.join('');
    </script>

</div>
