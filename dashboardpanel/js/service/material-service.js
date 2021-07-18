app.service("materialService", function($http) {
    this.selectedCategory = null;
    this.getAllMaterialcategories = () => {
        return $http.get('php/material/get-material-category.php').then(resp => resp.data);
    }
    this.createCategory = (category) => {
        const fd = this.getFormData(category);
        return $http({
            method: 'POST',
            data: fd,
            url: 'php/material/create-material-category.php',
            headers: {
                "Content-Type": undefined
            }
        }).then(resp => resp.data);
    }

    this.updateCategory = (id, category) => {
        const fd = this.getFormData(category);
        return $http({
            method: 'POST',
            data: fd,
            url: 'php/material/update-material-category.php?id='+id,
            headers: {
                "Content-Type": undefined
            }
        }).then(resp => resp.data);
    }
    this.getFormData = (category) => {
        const fd = new FormData();
        for(key in category){
            fd.append(key, category[key]);
        }
        return fd;
    }
    this.deleteCategory = (id) => {
        return $http.get('php/material/delete-material-category.php?id='+id).then(resp => resp.data);
    }
    this.setCategory = (category) => {
        this.selectedCategory = category;
    }
    this.getSelecetdCategory = () => {
        return this.selectedCategory;
    }
})