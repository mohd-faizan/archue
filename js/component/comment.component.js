app.component('comment', {
    template: `
    <div class="space"></div>
    <!-- Comments Container -->
    <div class="blog-header blog-bg mt-4">
        <h3 class="home-page-heading">Comments</h2>
    </div>
    <br />
    <div class="comments-container">
        <div class="card mb-3" ng-if="commentsOfBlog.length > 0" ng-repeat="commentOfBlog in commentsOfBlog">
            <div class="card-header">
                <div class="d-flex">
                    <div class="mr-3"><span class="fa fa-user fa-3x"></span></div>
                    <div>
                        {{ commentOfBlog.commented_by }} <br /> {{ commentOfBlog.commented_on | date:'mediumDate' }}
                    </div>
                </div>
            </div>
            <div class="card-body">{{ commentOfBlog.comment }}</div>
        </div>
        <div class="alert alert-danger" ng-if="commentsOfBlog.length == null || commentsOfBlog.length == undefined">
            No Comments found
        </div>
    </div>
    <div class="space"></div>
    <!-- Commenting Form -->
    <div class="blog-header blog-bg mt-4">
        <h3 class="home-page-heading">Leave a Comment</h2>
    </div>
    <div class="comment-form-container">
        <br />
        <form class="form-horizontal" ng-submit="submitBlogComment($event.target,commentor)" name="commentform">
            <fieldset>
                <!-- Text input-->
                <div class="form-group">
                    <input type="text" name="name" ng-model="commentor.name" placeholder="Your Name" class="form-control input-md" required>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <textarea class="form-control" ng-model="commentor.comment" name="comment" cols="20" rows="5" placeholder="Your Comment" required></textarea>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <button class="btn bg-color text-white" ng-disabled="!commentform.$valid">Comment</button>
                </div>
            </fieldset>
        </form>
    </div>

    <br />

    `,
    controller: function commentController($scope, fetchservice) {
        console.log($scope.$parent);
        console.log(fetchservice);
        $scope.submitBlogComment = (form, commentor) => {
            console.log(commentor);
            $scope.isShowLoad = true;
            var fd = new FormData();
            fd.append('name', commentor.name);
            fd.append('comment', commentor.comment);
            fd.append('id', $scope.$parent.id);
            fd.append('type', $scope.$parent.type);

            fetchservice.submitCommentBlog(fd, (resp) => {
                console.log(resp);
                $scope.isShowLoad = false;
                if (resp.status) {
                    form.reset();
                    alert('Thank you for the comment. We will publish it within 24 Hours');
                } else {
                    alert('Error! Please contact to web admin.');
                }
            });
        }
        fetchservice.fetchCommentsOfBlog({id: $scope.$parent.id, type: $scope.$parent.type}, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.commentsOfBlog = data.data;
    
                // for (let commentWithBlog of $scope.commentsWithBlog) {
                //     commentWithBlog.blog.url = commentWithBlog.blog.heading.replace(/\//g, "or");
                //     commentWithBlog.blog.url = commentWithBlog.blog.url.replace(/ /g, "-");
                //     commentWithBlog.blog.url = encodeURI(commentWithBlog.blog.url);
                //     console.log($scope.commentsWithBlog);
                // }
            } else {
                console.log("Error while Fetching Blogs Comment !!")
            }
        });
    
        $scope.setBlog = (blog) => {
            fetchservice.setFullBlog(blog);
        }
    
        $scope.isShowApprove = true;
        $scope.isShowsApprove = () => {
            $scope.isShowApprove = true;
        }
        $scope.isShowUnApprove = () => {
            $scope.isShowApprove = false;
        }
    
        $scope.deleteBlogComment = (comment_id) => {
            var fd = new FormData();
            fd.append('comment_id', comment_id);
            var delConfirmation = confirm("Are you sure ?");
            if (delConfirmation) {
                fetchservice.deleteBlogComment(fd, (data) => {
                    if (data.status == 'ok') {
                        window.location.href = "./blog-comments";
                    }
                })
            }
        }
        $scope.approveBlogComment = (comment_id) => {
            var fd = new FormData();
            fd.append('comment_id', comment_id);
            fetchservice.approveBlogComment(fd, (data) => {
                if (data.status == 'ok') {
                    window.location.href = "./blog-comments";
                }
            })
        }
    }

})