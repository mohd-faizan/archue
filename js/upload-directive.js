app.directive('validFile', function () {
    return {
        require: 'ngModel',
        link: function (scope, el, attrs, ngModel) {
            ngModel.$render = function () {
                ngModel.$setViewValue(el.val());
            };

            el.bind('change', function (e) {
                scope.$apply(function () {
                    ngModel.$render();
                });
            });
        }
    };
});

/*selective directive for validation*/
/*app.directive("selectValidate",()=>{
    return {
        require:'ngModel',
        link:(scope,elem,attr,ngModel)=>{
            function validate(value){
                if(value=="Select Category"){
                    ngModel.$setValidity("selectCat",false);
                }
                else{
                    ngModel.$setValidity("selectCat",true);
                }
                return value;
            }
            ngModel.$parsers.push(validate);
        }
    }
})*/

app.directive('ngFile', ['$parse', function ($parse) {
  return {
       restrict: 'A',
        link: function(scope, element, attrs) {
         element.bind('change', function(){
            if(scope.callService(element[0].files[0].type)){
                var reader = new FileReader();
                reader.onload = function (e) {
                                    scope.$apply(function () {
                                        scope.images1.push(e.target.result);   
                                    });
                            };
                 reader.readAsDataURL(element[0].files[0]);
                 scope.uploadfiles1.push(element[0].files[0]);
                 scope.$apply();
            }
            else{
                alert("Not a valid type please see on the top of this page for valid type");
            }
        });
    }
 };
}]);

app.directive('ngFile2', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {

            element.bind('change', function(){
                if(scope.callService(element[0].files[0].type)){
                    var reader = new FileReader();
                    reader.onload = function (e) {
                                        scope.$apply(function () {
                                            scope.images2.push(e.target.result);   
                                        });
                                };
                    reader.readAsDataURL(element[0].files[0]);
                    scope.uploadfiles2.push(element[0].files[0]);
                    scope.$apply();
                }
                else{
                    alert("Not a valid type please see on the top of this page for valid type");   
                }
           });
        }
   };
}]);
app.directive('ngFile3', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
           element.bind('change', function(){
                if(scope.callService(element[0].files[0].type)){
                    var reader = new FileReader();
                    reader.onload = function (e) {
                                        scope.$apply(function () {
                                            scope.images3.push(e.target.result);   
                                        });
                                };
                    reader.readAsDataURL(element[0].files[0]);
                     scope.uploadfiles3.push(element[0].files[0]);
                     scope.$apply();
                 }
                 else{
                    alert("Not a valid type please see on the top of this page for valid type");  
                 }
           });
        }
    };
}]);
app.directive('ngFile4', ['$parse', function ($parse) {
    return {
            restrict: 'A',
            link: function(scope, element, attrs) {
                element.bind('change', function(){
                    if(scope.callService(element[0].files[0].type)){
                        var reader = new FileReader();
                        reader.onload = function (e) {
                                            scope.$apply(function () {
                                                scope.images4.push(e.target.result);   
                                            });
                                    };
                        reader.readAsDataURL(element[0].files[0]);
                         scope.uploadfiles4.push(element[0].files[0]);
                         scope.$apply();
                    }
                    else{
                      alert("Not a valid type please see on the top of this page for valid type");  
                    }
                });
            }
    };
}]);



app.directive('ngFile5', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('change', function(){
                if(scope.callService(element[0].files[0].type)){
                    var reader = new FileReader();
                    reader.onload = function (e) {
                                        scope.$apply(function () {
                                            scope.images5.push(e.target.result);   
                                        });
                                };
                    reader.readAsDataURL(element[0].files[0]);
                     scope.uploadfiles5.push(element[0].files[0]);
                     scope.$apply();
                }
                else{
                    alert("Not a valid type please see on the top of this page for valid type");
                }
            });
        }
   };
}]);
app.directive("ratingStar",()=>{
    return {
        link:(scope,elem,attr)=>{
            elem.find('span').click((e)=>{
                angular.element(e.target).prevAll('span').addBack().addClass("checked");
                angular.element(e.target).nextAll().removeClass("checked");
                scope.$apply(()=>{
                    scope.star =  angular.element(e.target).prevAll('span').addBack().length;
                });
            });
        }
    }
});
/*show feedback controller */
app.directive("projectUpload",()=>{
    return{
        link:(scope,elem,attrs)=>{
            scope.$watch('isShowModal',(newV,oldv)=>{
                if(newV){
                    elem.find('#myModal').modal('show');
                }
            })
        }
    }
})

/*portfolio directive for validation*/
app.directive("portfolioValid",()=>{
    return{
        require: 'ngModel',
        link:(scope,elem,attr,ngModel)=>{
            ngModel.$render =  ()=>{
                ngModel.$setViewValue(elem.val());
            };
            elem.bind('change',()=>{
               if(scope.validatePortfolioFile(elem[0].files[0].name)){
                 console.log("validated");
                 scope.portfolioFile  = elem[0].files[0];
               }
               else{
                console.log("not validated");
                elem.val("");
                scope.$apply(()=>{
                    ngModel.$render();
                });
               }
            });
        }
    }
})

/*upload blog directive */
app.directive("blogDir",()=>{
    return{
        link:(scope,elem,attr)=>{
            var editor = elem.find("#editor");
            editor
            .contents()
            .prop('designMode','on');
            scope.onBlogSubmit = ()=>{
                var data = editor.contents().find('body').html(); 
                scope.myBlog  = data;
                if(scope.myBlog!=""){
                    scope.submitBlog();
                }
                else{
                    alert("please fill the content section")
                }
            }
        }
    }
})
/*js*/
function bold(x){
    editor.document.execCommand('bold',false,null);
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function italic(x){
    editor.document.execCommand('italic',false,null);
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function link(x){
    var link = prompt("enter link","http://www.")
    if(link != null){
        editor.document.execCommand('createlink',false,link);
    }
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function heading(){
    var h = $("#head option:selected").attr('value');
    editor.document.execCommand('formatBlock', false,h);
}
function heading2(x){
    editor.document.execCommand('formatBlock', false, '<h2>');
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function jleft(x){
    editor.document.execCommand('justifyLeft', false, '');
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function jright(x){
    editor.document.execCommand('justifyRight', false, '');
    angular.element(x).toggleClass("btn-active");
    angular.element(x).siblings().removeClass("btn-active");
}
function justify(x){
    angular.element(x).toggleClass("btn-active");
    editor.document.execCommand('justifyFull', false, '');
    angular.element(x).siblings().removeClass("btn-active");
}
function orderlist(x){
    angular.element(x).toggleClass("btn-active");
    editor.document.execCommand('insertOrderedList');
    angular.element(x).siblings().removeClass("btn-active");
}
function unorderlist(x){
    angular.element(x).toggleClass("btn-active");
    editor.document.execCommand('insertUnorderedList');
    angular.element(x).siblings().removeClass("btn-active");
}
function fontsize(x){
    editor.document.execCommand('fontSize',false,"7");
    var fontelem = editor.document.getElementsByTagName('font');
    for(let i=0;i<fontelem.length;i++){
        if(fontelem[i].size=="7"){
            fontelem[i].removeAttribute("size");
            fontelem[i].style.fontSize = x.value+"px";
        }
    }
}
/*function insertimage(){
    var image = prompt("Enter the Link of Image","http://www.");
    if(image != null){
        editor.document.execCommand("insertImage",false,image);
    }
}*/