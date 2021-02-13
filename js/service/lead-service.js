app.service('leadService', function($http) {

    this.getLeads = (offset, limit) => {
        return $http.get("./php/api/leads/get-leads.php?offset=" + offset + "&limit=" + limit);
    }
});