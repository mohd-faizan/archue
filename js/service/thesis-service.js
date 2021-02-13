app.service('thesisService', function($http) {
    this.incrementView = (id) => {
        return $http.get("./php/increment-thesis-view.php?id=" + id);
    }
    this.incrementLikes = (id) => {
        return $http.get('./php/increment-thesis-like.php?id=' + id);
    }
});