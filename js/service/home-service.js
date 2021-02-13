app.service('homeService', function($http) {

    this.getMaterial = (offset, limit) => {
        return $http.get("./php/api/material/getmaterial.php?offset=" + offset + "&limit=" + limit);
    }
    this.getProjects = (offset, limit) => {
        return $http.get("./php/api/projects/get-projects.php?offset=" + offset + "&limit=" + limit);
    }
    this.getCompetitions = (offset, limit) => {
        return $http.get("./php/api/competitions/get-competition.php?offset=" + offset + "&limit=" + limit);
    }
});