app.controller('CarouselCtrl', function($scope) {
    $scope.links = [{
            src: 'image/1.jpg',
            caption: "Discover the best works",
            lists: ["Architects", "Interior designers", "Product designers"],
            buttonText: "Visit projects",
            link: "/project"
        },
        {
            src: 'image/2.jpg',
            caption: "Get Help in your Project",
            listsText: ["We are helping Architects, Interior Designers and construction Managers over the world in thier Projects.", "Work with Archue to make you Project World class"],
            buttonText: "Visit project helper",
            link: "/project-helper"
        },
        {
            src: 'image/3.jpg',
            caption: "Find & Source Products & Materials",
            lists: ["Design products", "Interior products", "Building materials"],
            buttonText: "Visit materials",
            link: "/materials/Finishes/Metallics"
        }
    ];
});