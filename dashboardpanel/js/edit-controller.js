app.controller('editBlogController', ($scope, fetchservice) => {
    $scope.blog = fetchservice.getBlog();
    console.log($scope.blog);
    $scope.submitBlog = () => {
        console.log('submit blog');
    }
});