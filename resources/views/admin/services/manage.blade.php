<script type="text/ng-template" id="create-service.html">

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
                    <label>Url</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.url" style="color:black">
                </div> 
                <div class="form-group">
                    <label>Imagine</label>
                    <input type="file" style="display: none;" nv-file-select="" uploader="uploader"
                           id="file"
                           onchange="angular.element(this).scope().uploadAll()"/><br/>
                    <div class="input-group">
                        <input data-ng-if="vm.file.name" class="form-control" style="cursor: pointer" type="text"
                               readonly="readonly"
                               data-ng-click="vm.openChooseFile()" data-ng-model="vm.file.name"/>
                        <input data-ng-if="!vm.file.name && !vm.loadingFiles" class="form-control text-muted"
                               style="cursor: pointer" type="text" readonly="readonly"
                               value="Click aici pentru a alege fisier..." data-ng-click="vm.openChooseFile()"/>

                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-ng-click="vm.file = null;">
                                <i class="fa fa-trash"></i>
                            </button>

                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Url abonament 1 sedinta ( url paypal )</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.buy_one_link" style="color:black">
                </div>
                <div class="form-group">
                    <label>Descriere abonament 1 sedinta</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.buy_one_text" style="color:black">
                </div>
                <div class="form-group">
                    <label>Url abonament 5 sedinte ( url paypal ) </label>
                    <input class="form-control" type="text" data-ng-model="vm.item.buy_five_link" style="color:black">
                </div>
                <div class="form-group">
                    <label>Descriere abonament 5 sedinte</label>
                    <input class="form-control" type="text" data-ng-model="vm.item.buy_five_text" style="color:black">
                </div>
                <div class="form-group">
                    <label>Ordine</label>
                    <input class="form-control" type="number" data-ng-model="vm.item.ord" style="color:black">
                </div>
                <div class="form-group">
                    <label>Descriere</label>
                    <div text-angular
                         data-ng-model="vm.item.content"
                         ta-toolbar="vm.taToolbar"
                         ta-text-editor-class="form-control small-height"
                         ta-html-editor-class="form-control small-height">
                    </div>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Descriere scurta</label>
                    <div text-angular
                         data-ng-model="vm.item.content_short"
                         ta-toolbar="vm.taToolbar"
                         ta-text-editor-class="form-control small-height"
                         ta-html-editor-class="form-control small-height">
                    </div>
                    </textarea>
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
        .controller('ManageServiceController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance', 'item', 'path', 'FileUploader',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance,
                      item, path, FileUploader) {

                var vm = this;
                vm.itemName = 'serviciu';
                vm.openChooseFile = openChooseFile;
                $scope.uploadAll = uploadAll;
                var uploader = $scope.uploader = new FileUploader({
                    url: 'ajax/upload'
                });


                uploader.onSuccessItem = function (fileItem, file, status, headers) {
                    if (vm.callback) {
                        vm.callback(file);
                    }
                    vm.file = file;
                };


                function openChooseFile() {
                    document.getElementById('file').click();
                    vm.callback = null;
                }

                function uploadAll() {
                    vm.loadingFiles = true;
                    setTimeout(function () {
                        return $scope.uploader.uploadAll();
                    }, 100);
                }

                $scope.uploader.onCompleteAll = function (response) {
                    console.log(vm.file);
                    vm.item.image = vm.file.id;
                    vm.loadingFiles = false;
                };

                vm.taToolbar = [
                    ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'pre', 'quote'],
                    ['bold', 'italics', 'underline', 'strikeThrough', 'ul', 'ol', 'redo', 'undo', 'clear'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'indent', 'outdent' , 'html']
                ];
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
                    vm.item.image = vm.file.id;
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