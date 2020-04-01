<script type="text/ng-template" id="manage-document.html">
    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-header">
            <h3><% vm.item.id ? 'Editare' : 'Creare' %> <% vm.itemName %></h3>
        </div>
        <div class="modal-body">

            <form class="tnit-modal-form" data-ng-submit="vm.ok()">
                <div class="form-group">
                    <label>Titlu</label>
                    <input type="text" data-ng-model="vm.item.title" class="form-control"/>
                </div>
                <div class="form-group">
                    <label>Fisier</label>
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
                    <label>Descriere</label>
                    <div text-angular
                         data-ng-model="vm.item.description"
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
        .controller('ManageDocumentController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance', 'resolveItem', 'FileUploader',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance,
                      resolveItem, FileUploader) {
                var vm = this;

                vm.itemName = 'document';
                vm.taToolbar = [
                    ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'pre', 'quote'],
                    ['bold', 'italics', 'underline', 'strikeThrough', 'ul', 'ol', 'redo', 'undo', 'clear'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'indent', 'outdent']
                ];

                vm.item = angular.copy(resolveItem);

                vm.openChooseFile = openChooseFile;
                vm.downloadFile = downloadFile;
                $scope.uploadAll = uploadAll;
                var uploader = $scope.uploader = new FileUploader({
                    url: 'ajax/upload'
                });

                vm.file = {};

                uploader.onSuccessItem = function (fileItem, file, status, headers) {
                    if (vm.callback) {
                        vm.callback(file);
                    }
                    vm.file = file;
                };


                vm.yesNo = [
                    {
                        label: 'Da',
                        value: "1",
                    },
                    {
                        label: 'Nu',
                        value: "0",
                    }
                ];

                vm.ok = ok;
                vm.cancel = cancel;

                activate();

                function activate() {
                }


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
                    console.log(response);
                    vm.loadingFiles = false;
                };


                function downloadFile(file) {
                    window.open("ajax/files/" + file.id + "/download");
                    //   return SharedMedicalRequestsServices.downloadFile(file.id);
                }

                function cancel() {
                    $uibModalInstance.dismiss();
                }

                function ok() {
                    var data = angular.copy(vm.item);
                    data.file_id = vm.file.id;

                    return $http({
                        method: (vm.item.id ? 'PUT' : 'POST'),
                        url: "ajax/documents" + (vm.item.id ? '/' + vm.item.id : ''),
                        data: data
                    })
                        .then(function () {
                            toaster.success((vm.item.id ? 'Editare' : 'Creare') + vm.itemName + ' cu succes cu success!');
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