app.filter("myShow", () => {
    return (materials) => {
        var arr = [];
        for (let material of materials) {
            if (material.arbitory_show == 1) {
                arr.push(material);
            }
        }
        return arr;
    }
});
app.filter("myTime", () => {
    return (time) => {
        if (time != undefined) {
            return time.split(" ").pop();
        }
    }
})
app.filter("myDate", () => {
    return function(date) {
        if (date != undefined) {
            return new Date(date.split(" ")[0]);
        }
    }
})
app.filter("toDate", () => {
    return (date) => {
        return new Date(date);
    }
})
app.filter("getSingleImage", () => {
    return function(obj) {
        if (obj != undefined && obj.indexOf(",") > -1) {
            return obj.split(",").pop();
        } else {
            return obj;
        }
    }
})
app.filter("toArray", () => {
    return (imgarray) => {
        if (imgarray != undefined && imgarray.indexOf(",") > -1) {
            return imgarray.split(",");
        } else {
            return imgarray;
        }
    };
})
app.filter("hideEmail", () => {
    return function(email) {
        var firstpart = email.split("@")[0];
        var middlepart = firstpart.slice(firstpart.length / 2, firstpart.length);
        var secondpart = email.split("@")[1];
        var star = "";
        for (let i = 0; i < (firstpart.length / 2); i++) {
            star += "*";
        }
        return star + middlepart + '@' + secondpart;
    }
})
app.filter("hidePhone", () => {
    return function(phone) {
        var length = phone.length;
        var second = phone.slice(length / 2, length);
        var star = "";
        for (let i = 0; i < (length / 2); i++) {
            star += "*";
        }
        return star + second;
    }
})

app.filter("getName", () => {
    return function(path) {
        if (path != undefined) {
            return path.split("\\").pop();
        }
    }
})
app.filter("planName", () => {
    return (pages) => {
        var page = parseInt(pages, 10);
        if (page == 1) {
            return "SMALL BRAND";
        } else if (page == 3) {
            return "MEDIUM BRAND";
        } else if (page == 5) {
            return "LARGE BRAND";
        }
    }
})

app.filter("expirePlan", () => {
    return (date, duration) => {
        var mydate = date.split(" ")[0];
        var month = parseInt(duration.split(" ")[0], 10);
        var date = new Date(mydate);
        date.setMonth(date.getMonth() + month)
        return date;
    }
})
app.filter("myrand", () => {
    return (myran) => {
        let val = Math.floor((Math.random() * 100) + 10);
        if (myran == 'views') {
            val = val + 100;
        }
        return val;
    }
})

app.filter("toUpperCaseFirst", () => {
    return (mystr) => {
        if (mystr) {
            return mystr.charAt(0).toUpperCase() + mystr.slice(1);
        }
    }
})
app.filter('myfilter', () => {
    return (arr, key, val) => {
        if (key && val) {
            if (key !== "tentativeBudget") {

                const newArr = arr.filter(obj => {
                    // console.log("obj[key]", obj[key])
                    // console.log("vale", val);
                    if (obj[key].toLowerCase().indexOf(val.toLowerCase()) > -1) {
                        return true;
                    }
                    return false;
                })
                return newArr;
            } else {
                if (val === '5000000') {
                    // console.log(val);
                    const newArr = arr.filter(obj => {
                        if (parseInt(obj[key]) >= parseInt(val)) {
                            return true;
                        }
                        return false;
                    })
                    return newArr;
                } else {
                    const firstVal = val.split('-')[0];
                    const secondVal = val.split('-')[1];
                    // console.log(firstVal);
                    // console.log(secondVal);
                    const newArr = arr.filter(obj => {
                        if (parseInt(obj[key]) >= parseInt(firstVal) && parseInt(obj[key]) <= parseInt(secondVal)) {
                            return true;
                        } else {
                            return false;
                        }
                    });
                    return newArr;
                }
            }
        }
        return arr;
    }
})
app.filter('searchList', () => {
    return (arr, key, val) => {
        // console.log('key', key);
        // console.log('val', val);
        if (!key || !val) return arr; 
        const res =  arr.filter(item => item[key].toLowerCase() === val.toLowerCase());
        // console.log('res', res);
        return res;
    } 
})