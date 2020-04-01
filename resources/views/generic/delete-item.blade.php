<script type="text/ng-template" id="delete-item.html">

    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-body">
            <form method="get" class="tnit-modal-form" data-ng-submit="vm.createAccount()">
                <h4 class="text-center">Sigur vrei sa stergi <% vm.title %>?</h4>
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
                    <button class="btn btn-primary" type="submit" data-ng-click="vm.ok()"><i class="fa fa-trash"></i>
                        &nbsp;Sterge
                    </button>
                </div>
            </div>
        </div>
    </div>

</script>

<script type="text/javascript">
    angular.module('app')
        .controller('DeleteItemController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance', 'item', 'path',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance,
                      item, path) {

                var vm = this;
                vm.item = angular.copy(item);

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
                        url: "ajax/" + path + "/" + item.id
                    })
                        .then(function () {
                            toaster.success('Stergere cu success', 'Stergere item');
                            $uibModalInstance.close();
                        }).catch(function (error) {
                            toaster.error(error.data.message);
                        });
                }
            }
        ])
    ;
</script>