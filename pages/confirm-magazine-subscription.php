<section id="Confirmation-magazine" class="py-5" ng-controller="confirmationEMagazine">
    <div class="container">
        <div class="alert alert-success" ng-if="showSuccess">
            {{message}}
        </div>

        <div class="alert alert-danger" ng-if="showError">
            {{message}}
        </div>
        <div class="card" ng-if="showConfirmation">
            <div class="card-header">
                Subscription Confirmation
            </div>
            <table class="table table-bordered mb-0">
                <tbody>
                    <tr>
                        <th>Subscription Duration</th>
                        <td>{{ subscriptionData.duration }}</td>
                    </tr>
                    <tr>
                        <th>Associated Email</th>
                        <td>{{ subscriptionData.email }}</td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>
                            <div ng-if="showPrice">
                                <div class="d-inline-block float-left mt-1">
                                    <span ng-if="subscriptionData.currency == 'INR'">
                                        {{ subscriptionData.price | currency : "&#8377" }}
                                        <del ng-if="subscriptionData.oldPrice">
                                            {{ subscriptionData.oldPrice | currency : "&#8377" }}
                                        </del>
                                    </span>
                                    <span ng-if="subscriptionData.currency == 'USD'">
                                        {{ subscriptionData.price | currency : '$' }} &nbsp;&nbsp;
                                        <del ng-if="subscriptionData.oldPrice" class="d-inline-block mr-2">
                                            {{ subscriptionData.oldPrice | currency : '$' }}
                                        </del>
                                    </span>
                                </div>

                                <div class="d-inline-block float-right">
                                    <button class="btn btn-default" ng-click="showApplyReferralForm()">Apply Referral
                                        Code</button>
                                </div>
                            </div>

                            <div ng-if="showForm">
                                <div class="d-inline-block float-left mt-1">
                                    <form class="form-inline" ng-submit="applyCode(referralCode)" name="applyForm">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="referral-code" class="sr-only">Referral Code</label>
                                            <input type="text" class="form-control" id="referral-code"
                                                placeholder="Enter referral code" name="referral"
                                                ng-model="referralCode" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2"
                                            ng-disabled="!applyForm.$valid">Apply</button>
                                    </form>
                                </div>

                                <div class="d-inline-block float-right">
                                    <button class="btn btn-link" ng-click="hideApplyReferralForm()"><span
                                            class="fa fa-times"></span></button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="card-footer">
                <button class="btn btn-primary pull-right" ng-disabled="showForm"
                    ng-click="subscribe()">Proceed</button>
            </div>
        </div>
    </div>
</section>