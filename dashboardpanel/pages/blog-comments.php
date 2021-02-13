<div my-nav></div>
<section class="section-padding" id="blog-sec-1" ng-controller="fetchBlogCommentsController">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-7 col-sm-12">

                <button class="btn" ng-click="isShowUnApprove()" ng-class="{'btn-primary':!isShowApprove}">SEE APPROVE
                    BLOGS</button>
                <button class="btn" ng-click="isShowsApprove()" ng-class="{'btn-primary':isShowApprove}">SEE UNAPPROVE
                    BLOGS</button>
                <div class="space"></div>

                <div class="blog-container" ng-if="commentsWithBlog.length > 0">
                    <table class="table table-bordered comments-table">
                        <thead>
                            <tr>
                                <th>Commented_By</th>
                                <th>Commented</th>
                                <th>Commented_on</th>
                                <th>Commented_at</th>
                                <th>Blog</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-if="commentWithBlog.comment.is_approved==0" ng-show="isShowApprove" ng-repeat="commentWithBlog in commentsWithBlog">
                                <td> {{ commentWithBlog.comment.commented_by }} </td>
                                <td> {{ commentWithBlog.comment.comment }} </td>
                                <td> {{ commentWithBlog.comment.commented_on }} </td>
                                <td> {{ commentWithBlog.comment.commented_at }} </td>
                                <td> <a ng-href="./blog/{{commentWithBlog.blog.blog_id}}/{{commentWithBlog.blog.url}}" ng-click="setBlog(commentWithBlog.blog)">{{ commentWithBlog.blog.heading }} </a></td>
                                <td>
                                    <button class="btn btn-sm mb-2 btn-danger" ng-click="deleteBlogComment(commentWithBlog.comment.id)">Delete</button> <br />
                                    <button class="btn btn-sm btn-success" ng-click="approveBlogComment(commentWithBlog.comment.id)">Approve</button> 
                                </td>
                            </tr>
                            <tr ng-if="commentWithBlog.comment.is_approved==1" ng-show="!isShowApprove" ng-repeat="commentWithBlog in commentsWithBlog">
                                <td> {{ commentWithBlog.comment.commented_by }} </td>
                                <td> {{ commentWithBlog.comment.comment }} </td>
                                <td> {{ commentWithBlog.comment.commented_on }} </td>
                                <td> {{ commentWithBlog.comment.commented_at }} </td>
                                <td> <a ng-href="./blog/{{commentWithBlog.blog.blog_id}}/{{commentWithBlog.blog.url}}" ng-click="setBlog(commentWithBlog.blog)">{{ commentWithBlog.blog.heading }} </a></td>
                                <td>
                                    <button class="btn btn-sm mb-2 btn-danger" ng-click="deleteBlogComment(commentWithBlog.comment.id)">Delete</button> <br />
                                    <!-- <button class="btn btn-sm btn-success">Approve</button>  -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="alert alert-danger" ng-if="commentsWithBlog.length == 0">
                    No Comments on any Blog!
                </div>
            </div>
        </div>
    </div>
</section>