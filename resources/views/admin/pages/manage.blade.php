<script type="text/ng-template" id="create-page.html">

    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-header">
            <h3><% vm.item.id ? 'Editare' : 'Creare' %> <% vm.itemName %></h3>
        </div>
        <div class="modal-body">

            <form class="tnit-modal-form" data-ng-submit="vm.ok()">
                <div class="form-group">
                    <label>Limba</label>
                    <ui-select ng-model="vm.item.language_id">
                        <ui-select-match placeholder="Alege tip ..."><%$select.selected.label%></ui-select-match>
                        <ui-select-choices repeat="item.value as item in vm.languages | filter: $select.search">
                            <div ng-bind="item.label"></div>
                        </ui-select-choices>
                    </ui-select>
                </div>
                <div class="form-group">
                    <label>Titlu</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.title" style="color:black">
                </div>
                <div class="form-group">
                    <label>Identificator</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.identifier" style="color:black">
                </div>
                <div class="form-group">
                    <label>Meta</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.meta" style="color:black">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col-md-6 text-left">
                    <button class="btn btn-default" type="button" data-ng-click="vm.cancel()">
                        Anulare
                    </button>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-primary" type="submit" data-ng-click="vm.ok()">
                        <i class="fa  <% vm.item.id ? 'fa-save' : 'fa-plus' %>"></i> &nbsp;
                        <% vm.item.id ? 'Editare' : 'Creare' %> <% vm.itemName %>
                    </button>
                </div>
            </div>
        </div>
    </div>

</script>

<script type="text/javascript">
    angular.module('app')
        .controller('ManagePageController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance', 'item', 'path',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance,
                      item, path) {

                var vm = this;
                vm.itemName = 'pagina';
                vm.item = angular.copy(item);

                vm.languages = [
                    {
                        label: 'Romana',
                        value: "1",
                    },
                    {
                        label: 'Engleza',
                        value: "2",
                    }
                ];

                vm.ok = ok;
                vm.cancel = cancel;

                activate();

                function activate() {
                }

                function cancel() {
                    $uibModalInstance.dismiss();
                }

                function ok() {
                    var data = angular.copy(vm.item);
                    return $http({
                        method: (vm.item.id ? 'PUT' : 'POST'),
                        url: "ajax/" + path + (vm.item.id ? '/' + vm.item.id : ''),
                        data: data
                    })
                        .then(function () {
                            toaster.success((vm.item.id ? 'Editare' : 'Creare') + ' cu success!');
                            $uibModalInstance.close();

                        }).catch(function (error) {
                            toaster.error(error.data.message);
                        });
                }

            }
        ])
    ;
</script>
<style>
    .ui-select-container {
        padding: 0px !important;
    }
</style>