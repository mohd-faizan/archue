app.directive('validFile', function() {
    return {
        require: 'ngModel',
        link: function(scope, el, attrs, ngModel) {
            ngModel.$render = function() {
                ngModel.$setViewValue(el.val());
            };
            el.bind('change', function(e) {
                if (el.val() != "") {
                    scope.$apply(function() {
                        ngModel.$render(el.val());
                    });
                } else {
                    console.log(el.val());
                }
            });
            scope.removeImage = (arr, upload, index) => {
                arr.splice(index, 1);
                upload.splice(index, 1);
            }
        },
    };
});


app.directive('ngFile', ['$parse', 'validationService', function($parse, validationService) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function() {
                if (element[0].files[0] != undefined) {
                    if (scope.callService(element[0].files[0])) {
                        var reader = new FileReader();
                        var result;
                        reader.onload = function(e) {
                            scope.$apply(function() {
                                result = e.target.result;
                            });
                        };
                        reader.readAsDataURL(element[0].files[0]);
                        // element.prev().hide();
                        element.parent().next().show();
                        element.parent().next().next().show();
                        validationService.mycompress(element[0].files[0], element)
                            .then((resp) => {
                                console.log(resp.data);
                                scope.uploadfiles1.push(JSON.parse(resp.data));
                                console.log(scope.uploadfiles1);
                                scope.images1.push("/uploads/" + JSON.parse(resp.data));
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                // element.prev().show();
                            }, (err) => {
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                alert("Each File size must be lowerthan 10mb.")
                            });
                        scope.$apply();
                    } else {
                        alert("Not a valid type please see on the top of this page for valid type");
                    }
                }
            });
        }
    };
}]);

app.directive('ngFile2', ['$parse', 'validationService', function($parse, validationService) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {

            element.bind('change', function() {
                if (element[0].files[0] != undefined) {
                    if (scope.callService(element[0].files[0])) {
                        var result;
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            scope.$apply(function() {
                                result = e.target.result;

                            });
                        };
                        reader.readAsDataURL(element[0].files[0]);
                        // element.prev().hide();
                        element.parent().next().show();
                        element.parent().next().next().show();
                        validationService.mycompress(element[0].files[0], element)
                            .then((resp) => {
                                scope.uploadfiles2.push(JSON.parse(resp.data));
                                scope.images2.push("/uploads/" + JSON.parse(resp.data));
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                // element.prev().show();
                            }, (err) => {
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                alert("Each File size must be lowerthan 10mb.")
                            });
                        scope.$apply();
                    } else {
                        alert("Not a valid type please see on the top of this page for valid type");
                    }
                }
            });
        }
    };
}]);
app.directive('ngFile3', ['$parse', 'validationService', function($parse, validationService) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function() {
                if (element[0].files[0] != undefined) {
                    if (scope.callService(element[0].files[0])) {
                        var result;
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            scope.$apply(function() {
                                result = e.target.result;

                            });
                        };
                        reader.readAsDataURL(element[0].files[0]);
                        // element.prev().hide();
                        element.parent().next().show();
                        element.parent().next().next().show();
                        validationService.mycompress(element[0].files[0], element)
                            .then((resp) => {
                                scope.uploadfiles3.push(JSON.parse(resp.data));
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                scope.images3.push("/uploads/" + JSON.parse(resp.data));
                                // element.prev().show();
                            }, (err) => {
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                alert("Each File size must be lowerthan 10mb.")
                            });
                        scope.$apply();
                    } else {
                        alert("Not a valid type please see on the top of this page for valid type");
                    }
                }
            });
        }
    };
}]);
app.directive('ngFile4', ['$parse', 'validationService', function($parse, validationService) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function() {
                if (element[0].files[0] != undefined) {
                    if (scope.callService(element[0].files[0])) {
                        var result;
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            scope.$apply(function() {
                                result = e.target.result;

                            });
                        };
                        reader.readAsDataURL(element[0].files[0]);
                        // element.prev().hide();
                        element.parent().next().show();
                        element.parent().next().next().show();
                        validationService.mycompress(element[0].files[0], element)
                            .then((resp) => {
                                scope.uploadfiles4.push(JSON.parse(resp.data));
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                scope.images4.push("/uploads/" + JSON.parse(resp.data));
                                // element.prev().show();   
                            }, (err) => {
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                alert("Each File size must be lowerthan 10mb.")
                            });
                        scope.$apply();
                    } else {
                        alert("Not a valid type please see on the top of this page for valid type");
                    }
                }
            });
        }
    };
}]);



app.directive('ngFile5', ['$parse', 'validationService', function($parse, validationService) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function() {
                if (element[0].files[0] != undefined) {
                    if (scope.callService(element[0].files[0])) {
                        var reader = new FileReader();
                        var result;
                        reader.onload = function(e) {
                            scope.$apply(function() {
                                result = e.target.result;

                            });
                        };
                        reader.readAsDataURL(element[0].files[0]);
                        // element.prev().hide();
                        element.parent().next().show();
                        element.parent().next().next().show();
                        validationService.mycompress(element[0].files[0], element)
                            .then((resp) => {
                                console.log(resp.data);
                                scope.uploadfiles5.push(JSON.parse(resp.data));
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                scope.images5.push("/uploads/" + JSON.parse(resp.data));
                                // element.prev().show();       
                            }, (err) => {
                                element.parent().next().hide();
                                element.parent().next().next().hide();
                                alert("Each File size must be lowerthan 10mb.")
                            });
                        scope.$apply();
                    } else {
                        alert("Not a valid type please see on the top of this page for valid type");
                    }
                }
            });
        }
    };
}]);

app.directive("feedbackDir", () => {
    return {
        link: (scope, elem, attr) => {
            $('#myModal').on('hide.bs.modal', function(e) {
                window.location.href = "./";
            })
        }
    }
})
app.directive("ratingStar", () => {
    return {
        link: (scope, elem, attr) => {
            elem.find('span').click((e) => {
                angular.element(e.target).prevAll('span').addBack().addClass("checked");
                angular.element(e.target).nextAll().removeClass("checked");
                scope.$apply(() => {
                    scope.star = angular.element(e.target).prevAll('span').addBack().length;
                });
            });
        }
    }
});
/*show feedback controller */
app.directive("projectUpload", () => {
    return {
        link: (scope, elem, attrs) => {
            scope.$watch('isShowModal', (newV, oldv) => {
                if (newV) {
                    elem.find('#myModal').modal('show');
                }
            })
        }
    }
})

/*portfolio directive for validation*/
app.directive("portfolioValid", () => {
    return {
        require: 'ngModel',
        link: (scope, elem, attr, ngModel) => {
            ngModel.$render = () => {
                ngModel.$setViewValue(elem.val());
            };
            elem.bind('change', () => {
                if (scope.validatePortfolioFile(elem[0].files[0].name)) {
                    console.log("validated");
                    scope.portfolioFile = elem[0].files[0];
                    //console.log(scope.portfolioFile);
                } else {
                    console.log("not validated.");
                    elem.val("");
                    scope.$apply(() => {
                        ngModel.$render();
                    });
                }

            });
        }
    }
})

// material upload 
// app.directive("materialImages",()=>{
//     return {
//         link:(scope,elem,attrs)=>{
//             elem.bind("change",(e)=>{
//                 for(let obj of e.target.files){
//                     if(scope.validateMaterialImages(obj.name)){
//                         console.log("validate");
//                     }
//                     else{
//                         console.log("not validated");
//                     }
//                 }
//             })
//         }
//     }
// })
app.directive("collectFile", () => {
    return {
        link: (scope, elem, attrs) => {
            elem.bind('change', (event) => {
                for (let obj of event.target.files) {
                    if (attrs.name == "cataloguepdf") {
                        scope.catalogueImage = obj;
                    } else if (attrs.name == "proimages") {
                        // console.log(obj);
                        // scope.proimages.push(obj);
                        if (scope.productImages == undefined) {
                            scope.productImages = []
                        }
                        scope.productImages.push({
                            src: obj,
                            image: URL.createObjectURL(obj)
                        });
                    }
                }
                scope.$digest();
            })
        }
    }
})

/*upload blog directive */
app.directive("blogDir", () => {
    return {
        link: (scope, elem, attr) => {

            DecoupledEditor
                .create(document.querySelector('#editor'), {
                    toolbar: ['heading', '|', 'undo', 'redo', 'bold', 'italic', 'bulletedList', 'numberedList', 'imageUpload', 'Alignment', 'Underline', "FontSize", 'Link', 'MediaEmbed'],
                    fontSize: {
                        options: [9, 10, 11, 12, 13, 14, 15, 16, 18, 20, 22, 24, 26, 28, 36, 48]
                    },
                    extraPlugins: [MyCustomUploadAdapterPlugin]
                })
                .then(editor => {
                    let count = 0;
                    const toolbarContainer = document.querySelector('#toolbar-container');
                    toolbarContainer.appendChild(editor.ui.view.toolbar.element);
                    $(editor.sourceElement).focus(() => {
                        if (count == 0) {
                            $(editor.sourceElement).children()[0].innerHTML = "";
                            count++;
                        }
                    })
                })
                .catch(error => {
                    console.error(error);
                });
            // var editor = elem.find("#editor");
            // editor
            // .contents()
            // .prop('designMode','on');
            scope.onBlogSubmit = () => {
                // var data = editor.contents().find('body').html();

                const editorData = $('#editor').html();
                scope.myBlog = editorData;
                if (scope.myBlog != "") {
                    scope.submitBlog();
                } else {
                    alert("please fill the content section")
                }
            }
        }
    }
})

/*js*/
// function bold(x){
//     editor.document.execCommand('bold',false,null);
//     angular.element(x).toggleClass("btn-active");
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function italic(x){
//     editor.document.execCommand('italic',false,null);
//     angular.element(x).toggleClass("btn-active");
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function link(x){
//     var link = prompt("enter link","http://www.")
//     if(link != null){
//         editor.document.execCommand('createlink',false,link);
//     }
//     angular.element(x).toggleClass("btn-active");
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function heading(){
//     var h = $("#head option:selected").attr('value');
//     editor.document.execCommand('formatBlock', false,h);
// }
// function heading2(x){
//     editor.document.execCommand('formatBlock', false, '<h2>');
//     angular.element(x).toggleClass("btn-active");
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function jleft(x){
//     editor.document.execCommand('justifyLeft', false, '');
//     angular.element(x).toggleClass("btn-active");
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function jright(x){
//     editor.document.execCommand('justifyRight', false, '');
//     angular.element(x).toggleClass("btn-active");
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function justify(x){
//     angular.element(x).toggleClass("btn-active");
//     editor.document.execCommand('justifyFull', false, '');
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function orderlist(x){
//     angular.element(x).toggleClass("btn-active");
//     editor.document.execCommand('insertOrderedList');
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function unorderlist(x){
//     angular.element(x).toggleClass("btn-active");
//     editor.document.execCommand('insertUnorderedList');
//     angular.element(x).siblings().removeClass("btn-active");
// }
// function fontsize(x){
//     editor.document.execCommand('fontSize',false,"7");
//     var fontelem = editor.document.getElementsByTagName('font');
//     for(let i=0;i<fontelem.length;i++){
//         if(fontelem[i].size=="7"){
//             fontelem[i].removeAttribute("size");
//             fontelem[i].style.fontSize = x.value+"px";
//         }
//     }
// }

/*function insertimage(){
    var image = prompt("Enter the Link of Image","http://www.");
    if(image != null){
        editor.document.execCommand("insertImage",false,image);
    }
}*/