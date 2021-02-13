app.service('projectService', function($http) {
    this.incrementProjectView = (id) => {
        return $http.get("./php/increment-project.php?id=" + id);
    }
    this.incrementLikes = (projectId) => {
        return $http.get('./php/increment-project-likes.php?id=' + projectId);
    }
});