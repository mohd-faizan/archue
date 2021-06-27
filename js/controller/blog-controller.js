/*blog fetched*/
app.controller("fetchBlogController", ($sce, fetchservice, $scope) => {
    $scope.limit = 15;
    $scope.active = 1;
    $scope.skip = 0;
    $scope.fetchBlog = (skip, limit) => {
        fetchservice.fetchBlog(skip, limit, (data) => {
            console.log(data);
            if (data.status == "yes") {
                $scope.blogs = data.resp;
                for (let blog of $scope.blogs) {
                    blog.url = blog.heading.replace(/[&\/\\#,+()$~%.'":*?<>{}]/g, '_');
                    blog.url = blog.url.replace(/ /g, "-");
                }
            } else {
                console.log(data.resp);
            }
            $scope.count = data.count;
            console.log($scope.count)
            let pages = 0;
            if ($scope.count > $scope.limit) {
                pages = ($scope.count % $scope.limit) === 0 ? ($scope.count / $scope.limit) : Math.floor(($scope.count / $scope.limit)) + 1;
            } else {
                pages = 1;
            }
            $scope.paginations = new Array(pages);
        });
    }
    $scope.trust = (html) => {
        return $sce.trustAsHtml(html);
    }
    $scope.setBlog = (blog) => {
        fetchservice.setFullBlog(blog);
    }
    $scope.fetchBlog(0, $scope.limit);

    $scope.toPage = (index) => {
        if ($scope.active === index) {
            return;
        }
        $scope.skip = index * $scope.limit - $scope.limit;
        $scope.fetchBlog($scope.skip, $scope.limit);
        $scope.active = index;
    }
    $scope.next = () => {
        $scope.active = $scope.active + 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchBlog($scope.skip, $scope.limit);
    }
    $scope.prev = () => {
        $scope.active = $scope.active - 1;
        $scope.skip = $scope.active * $scope.limit - $scope.limit;
        $scope.fetchBlog($scope.skip, $scope.limit);
    }
    $scope.increaseLike = (id) => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeBlog(id).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchBlog($scope.skip, $scope.limit);
                },
                (err) => {
                    console.log(err);
                }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    }
})
app.controller("fullBlogController", ($sce, $scope, fetchservice, $route, ngMeta) => {
    $scope.isShowLoad = false;
    $scope.duration = 0;

    var blog_id;
    $scope.id = ''
    $scope.fetchOneBlog = () => {
        fetchservice.fetchOneBlog($route.current.params.id, (data) => {
            console.log("data", data);
            let resp = data.data;
            // fetchservice.getOneFromArrObj($route.current.params.id, data.resp, (resp) => {
            if (!data.status) {
                $scope.blog = undefined;
            } else {
                $scope.blog = resp;
                // console.log($scope.blog);
                const wordsPerMinute = 270; // average case
                const imageReadTime = 0.2;
                let totalText = $scope.blog.heading + ' ' + $scope.blog.html_content;
                $scope.duration = getDuration(totalText);

                function getDuration(text) {
                    let textLength = text.split(" ").length; // Split by words
                    const imgArr = text.split('<img');
                    if (textLength > 0) {
                        let value = Math.ceil(textLength / wordsPerMinute);
                        return value + Math.ceil(imgArr.length * imageReadTime);
                    }
                }
                blog_id = $scope.blog.blog_id;
                $scope.id = $scope.blog.blog_id;
                $scope.type = 'BLOG';
                $scope.blog.url = $scope.blog.heading.replace(/\//g, 'OR');
                $scope.blog.url = $scope.blog.heading.replace(/ /g, '-');
                $scope.blog.url = encodeURI($scope.blog.url);

                /* Get text from Html content with Tag */
                function stripHtml(html) {
                    // Create a new div element
                    var temporalDivElement = document.createElement("div");

                    // Set the HTML content with the providen
                    temporalDivElement.innerHTML = html;

                    // Retrieve the text property of the element (cross-browser support)
                    return temporalDivElement.textContent || temporalDivElement.innerText || "";
                }

                /* Title of the Page as Title of the Project */
                ngMeta.setTitle($scope.blog.heading, '');
                ngMeta.setTag('url', 'https://www.archue.com/blogs/' + $scope.blog.blog_id + '/' + $scope.blog.url);
                ngMeta.setTag('image', 'https://www.archue.com/upload-file/' + $scope.blog.blog_file);
                ngMeta.setTag('description', stripHtml($scope.blog.html_content));

                $scope.trust = (html) => {
                    return $sce.trustAsHtml(html);
                }

                fetchservice.fetchSimilarBlogs(blog_id, (data) => {
                    if (data.status == 'ok') {
                        $scope.similarBlogs = data.data;
                        for (similarBlog of $scope.similarBlogs) {
                            similarBlog.url = similarBlog.heading.replace(/\//g, 'OR');
                            similarBlog.url = similarBlog.heading.replace(/ /g, '-');
                            similarBlog.url = encodeURI(similarBlog.url);
                        }
                        // console.log($scope.similarBlogs);
                    }
                })

                /* Get Comments Of This Blog */
                fetchservice.fetchCommentsOfBlog(blog_id, (data) => {
                        if (data.status == 'Ok') {
                            $scope.commentsOfBlog = data.data;
                        }
                    })
                    // next and prev blog
                $scope.next($scope.blog.blog_id, true, (data) => {
                    if (data.status) {
                        $scope.nxt = data.data;
                        $scope.nxt.url = $scope.nxt.heading.replace(/ /g, "-");
                        $scope.nxt.url = $scope.nxt.url.replace(/\//g, "-");
                    } else {
                        console.log("Next Not Found");
                    }
                });
                $scope.next($scope.blog.blog_id, false, (data) => {
                    // console.log(data);
                    if (data.status) {
                        $scope.prev = data.data;
                        $scope.prev.url = $scope.prev.heading.replace(/ /g, "-");
                        $scope.prev.url = $scope.prev.url.replace(/\//g, "-");
                    } else {
                        console.log("Prev Not Found");
                    }
                })
            }
            // })
        });
    }


    $scope.submitBlogComment = (form, commentor) => {
            console.log(commentor);
            $scope.isShowLoad = true;
            var fd = new FormData();
            fd.append('name', commentor.name);
            fd.append('comment', commentor.comment);
            fd.append('blog_id', blog_id);

            fetchservice.submitCommentBlog(fd, (resp) => {
                console.log(resp);
                $scope.isShowLoad = false;
                if (resp.status) {
                    form.reset();
                    alert('Thank you for the comment. We will publish it within 24 Hours');
                } else {
                    alert('Error! Please contact to web admin.');
                }
            });
        }
        // next and previous
    $scope.next = (blog_id, isNext, cb) => {
        fetchservice.fetchNextPrevBlog(blog_id, isNext, (data) => {
            if (data.status) {
                cb(data);
            } else {
                data.status = false;
                cb(data);
            }
        })
    }
    $scope.fetchOneBlog();
    $scope.increaseLike = () => {
        if ($scope.$parent.user.isLoggedIn()) {
            fetchservice.increaseLikeBlog($route.current.params.id).then(
                (resp) => {
                    console.log(resp);
                    $scope.fetchOneBlog();
                },
                (err) => {
                    console.log(err);
                }
            );
        } else {
            const url = window.location.pathname;
            localStorage.setItem('backTo', url);
            $scope.$parent.location.path("/login");
        }
    }
    $scope.increaseViews = (id) => {
        fetchservice.increaseViewsBlog(id).then(
            (res) => {
                console.log(res);
                $scope.fetchOneBlog();
            },
            (err) => {
                console.log(err);
            }
        );
    }
    $scope.increaseViews($route.current.params.id);
})


app.controller("fetchBlogCommentsController", (fetchservice, $scope) => {
    fetchservice.fetchBlogComments((data) => {
        if (data.status == "yes") {
            $scope.commentsWithBlog = data.data;

            for (let commentWithBlog of $scope.commentsWithBlog) {
                commentWithBlog.blog.url = commentWithBlog.blog.heading.replace(/\//g, "or");
                commentWithBlog.blog.url = commentWithBlog.blog.url.replace(/ /g, "-");
                commentWithBlog.blog.url = encodeURI(commentWithBlog.blog.url);
                console.log($scope.commentsWithBlog);
            }
        } else {
            console.log("Error while Fetching Blogs Comment !!")
        }
    });

    $scope.setBlog = (blog) => {
        fetchservice.setFullBlog(blog);
    }

    $scope.isShowApprove = true;
    $scope.isShowsApprove = () => {
        $scope.isShowApprove = true;
    }
    $scope.isShowUnApprove = () => {
        $scope.isShowApprove = false;
    }

    $scope.deleteBlogComment = (comment_id) => {
        var fd = new FormData();
        fd.append('comment_id', comment_id);
        var delConfirmation = confirm("Are you sure ?");
        if (delConfirmation) {
            fetchservice.deleteBlogComment(fd, (data) => {
                if (data.status == 'ok') {
                    window.location.href = "./blog-comments";
                }
            })
        }
    }
    $scope.approveBlogComment = (comment_id) => {
        var fd = new FormData();
        fd.append('comment_id', comment_id);
        fetchservice.approveBlogComment(fd, (data) => {
            if (data.status == 'ok') {
                window.location.href = "./blog-comments";
            }
        })
    }
})

/*upload blog */
app.controller("blogController", (validationService, $rootScope, $scope, uploadService) => {
    $scope.fontsize = [8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48, 72]
    $scope.blog_category = "Select Category";
    $scope.validatePortfolioFile = (blog) => {
        ext = ['jpeg', 'jpg', 'png'];
        if (!validationService.validPortfolio(blog, ext)) {
            alert("You can choose image only.");
        } else {
            return true;
        }
    }
    $scope.submitBlog = () => {
        $scope.$parent.isLoad = true;
        var myBlogData = {};
        myBlogData.blog_heading = $scope.blog_heading;
        myBlogData.blog_category = $scope.blog_category;
        myBlogData.myBlog = $scope.myBlog;
        myBlogData.blog_file = $scope.portfolioFile;
        myBlogData.id = $rootScope.userData.id;
        var fd = new FormData();
        for (let i in myBlogData) {
            fd.append(i, myBlogData[i]);
        }
        uploadService.sUploadBlog(fd, (data) => {
            console.log(data)
            if (data.status == "yes") {
                $rootScope.isShowThanksModal = true;
                $scope.$parent.isLoad = false;
                // alert("Succesfully submitted.Your Work is published within 72 hours");
                // window.location.href = "./dashboard";
            } else {
                alert(data.message);
                window.location.reload();
            }
        })
    }
})