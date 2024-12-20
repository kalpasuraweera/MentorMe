Add task form component (pop-up)
<!-- used updateOverlay class for this overlay -->
<div id="updateTaskFormOverlay" class="updateOverlay" style="display: none;">
    <div class="updatepopup">
        <form id="updateTaskForm" action="" method="post" class="updateForm">
        <div class="update-task-container">
            <div class="update-task-header">
                <div class="update-task-header-left">
                <h2>Create Coordinator Dashboard</h2>
                <span class="status-badge">Done</span>
                </div>
                <div class="header-right">
                <button class="move-btn">Move to todo</button>
                <button class="close-btn">&times;</button>
                </div>
            </div>

            <div class="update-task-body">
                <div class="details">
                <p><strong>Assignee:</strong> Kalpa Suraweera</p>
                <p><strong>Due Date:</strong> Aug 16, 2024, 11:06 PM</p>
                <p><strong>Estimated Time:</strong> 5 hours</p>
                </div>

                <div class="history">
                <h3>History</h3>
                <div class="data-border">
                    <ul>
                    <li><strong>Task Created</strong> Aug 16, 2024, 11:06 PM</li>
                    <li><strong>Task Assigned</strong> Aug 16, 2024, 11:06 PM</li>
                    <li><strong>Task Completed</strong> Aug 16, 2024, 11:06 PM</li>
                    <li><strong>Task Reviewed</strong> Aug 16, 2024, 11:06 PM</li>
                    </ul>
                </div>
                </div>
            </div>

            <div class="description-section">
                <h3>Description</h3>
                <div class="data-border">
                <p>
                    Create a dashboard for coordinators to manage students. Coordinators should be able
                    to view student data, update student data, and add new students.
                </p>
                </div>
            </div>

            <div class="pull-request-section">
                <h3>Pull Request Link</h3>
                <div class="data-border">
                <a href="https://github.com/mentorme/pull/1" target="_blank">
                    https://github.com/mentorme/pull/1
                </a>
                </div>
            </div>

            <div class="comments-section">
                <h3>Comments</h3>
                <textarea placeholder="thamindu"></textarea>
                <button class="comment-btn">Comment</button>

                <div class="comment-list">
                <div class="comment">
                    <p><strong>Kalpa Suraweera</strong> <span>Aug 16, 2024, 11:06 PM</span></p>
                    <p>
                    What are long descriptions? Long descriptions are text versions of the
                    information provided in a detailed or complex image.
                    </p>
                </div>
                </div>
            </div>
            </div>

        </form>
    </div>
</div>
