<div my-nav></div>
<div class="space"></div>
<section id="material" ng-controller="newsLetterUsersController">
    <div class="container table-responsive">
        <h3 class="theme-font mb-4">Newsletter Subscribed Users</h3>
        <button class="btn btn-primary pull-right mb-4" ng-click="cToExcel()">TO EXCEL</button>
        <div class="architect-container table-responsive mb-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Index</th>
                        <th>Name</th>
                        <th>EMAIL</th>
                        <th>Subscribed ON</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="newsLetterUser in newsLetterUsers|limitTo:myUserLimit">
                        <td>{{newsLetterUsers.length-$index}}</td>
                        <td>{{newsLetterUser.name}}</td>
                        <td>{{newsLetterUser.email}}</td>
                        <td>{{newsLetterUser.subscribed_on | date:"mediumDate"}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div align="left"> <button ng-click="increaseUserLimit()" class="btn btn-primary">Next</button></div>
    </div>
</section>