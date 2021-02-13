app.controller('testimonialController', ($scope) => {
    $scope.testimonials = [
        { caption: 'codepen', text: 'ArchDaily', src: 'image/partner/arch-daily.png' },
        { caption: 'newspaper-o', text: 'Bustler', src: 'image/partner/bustler.png' },
        { caption: 'television', text: 'Call for project', src: 'image/partner/call-for-project.svg' },
        { caption: 'television', text: 'ARCHI.RU', src: 'image/partner/archi-ru.png' },
        { caption: 'television', text: 'ArchitectureQuote', src: 'image/partner/architecture-qoute.webp' },
        { caption: 'television', text: 'e-architect', src: 'image/partner/e-architect.png' },
        { caption: 'television', text: 'The Competitions Blog', src: 'image/partner/the-comp-blog.jpg' },
        { caption: 'television', text: 'aasarchitecture', src: 'image/partner/a-as-architect.png', isResize: true },
        {
            caption: 'television',
            text: 'ARTSPARKR',
            src: 'image/partner/arts-parkr.png'
        }
    ];
    //
});