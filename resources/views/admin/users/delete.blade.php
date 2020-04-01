<script type="text/ng-template" id="delete-user.html">

    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-body">
            <form method="get" class="tnit-modal-form" data-ng-submit="vm.createAccount()">
                <h4 class="text-center">Sigur vrei sa stergi userul?</h4>
            </form>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-md-6 text-left">
                    <button class="btn btn-default" type="button" data-ng-click="vm.cancel()">
                        Cancel
                    </button>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary" type="submit" data-ng-click="vm.ok()"><i class="fa fa-trash"></i> &nbsp;Sterge</button>
                </div>
            </div>
        </div>
    </div>

</script>

<script type="text/javascript">
    angular.module('app')
        .controller('DeleteUserController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance', 'resolveUser',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance,
                      resolveUser) {

                var vm = this;
                vm.user = angular.copy(resolveUser);

                vm.ok = ok;
                vm.cancel = cancel;

                activate();

                function activate() {
                }

                function cancel() {
                    $uibModalInstance.dismiss();
                }

                function ok() {
                    return $http({
                        method: "DELETE",
                        url: "ajax/users/" + vm.user.id
                    })
                        .then(function () {
                            toaster.success('Stergere user cu success', 'Stergere user');
                            $uibModalInstance.close();
                        }).catch(function (error) {
                            toaster.error(error.data.message);
                        });
                }
            }
        ])
    ;
</script>