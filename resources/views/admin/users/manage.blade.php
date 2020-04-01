<script type="text/ng-template" id="create-user.html">

    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-header">
            <h3><% vm.user.id ? 'Editare' : 'Creare' %> user</h3>
        </div>
        <div class="modal-body">

            <form class="tnit-modal-form" data-ng-submit="vm.ok()">
                <div class="inner-holder">
                    <label>Este coach</label>
                    <ui-select ng-model="vm.user.is_coach">
                        <ui-select-match placeholder="Alege tip ..."><%$select.selected.label%></ui-select-match>
                        <ui-select-choices repeat="item.value as item in vm.yesNo | filter: $select.search">
                            <div ng-bind="item.label"></div>
                        </ui-select-choices>
                    </ui-select>
                </div>
                <div class="inner-holder">
                    <label>Nume</label>
                    <input type="text" data-ng-model="vm.user.first_name" style="color:black">
                </div>
                <div class="inner-holder">
                    <label>Prenume</label>
                    <input type="text" data-ng-model="vm.user.last_name" style="color:black">
                </div>
                <div class="inner-holder">
                    <label>Email</label>
                    <input type="email" autocomplete="new-password" data-ng-model="vm.user.email" style="color:black">
                </div>
                <div class="inner-holder">
                    <label>Telefon</label>
                    <input type="text" autocomplete="new-password" data-ng-model="vm.user.phone" style="color:black">
                </div>

                <div class="inner-holder">
                    <label>Parola</label>
                    <input type="password" autocomplete="new-password" data-ng-model="vm.user.password"
                           style="color:black">
                </div>

                <div class="inner-holder">
                    <label>Repeta parola</label>
                    <input type="password" data-ng-model="vm.user.repeatPassword" style="color:black">
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
                    <label>Descriere Romana</label>
                    <div text-angular
                         data-ng-model="vm.user.description_ro"
                         ta-toolbar="vm.taToolbar"
                         ta-text-editor-class="form-control small-height"
                         ta-html-editor-class="form-control small-height">
                    </div>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Descriere Engleza</label>
                    <div text-angular
                         data-ng-model="vm.user.description_en"
                         ta-toolbar="vm.taToolbar"
                         ta-text-editor-class="form-control small-height"
                         ta-html-editor-class="form-control small-height">
                    </div>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Abstract Romana</label>
                    <div text-angular
                         data-ng-model="vm.user.abstract_ro"
                         ta-toolbar="vm.taToolbar"
                         ta-text-editor-class="form-control small-height"
                         ta-html-editor-class="form-control small-height">
                    </div>
                    </textarea>
                </div>
                <div class="form-group">
                    <label>Abstract Engleza</label>
                    <div text-angular
                         data-ng-model="vm.user.abstract_en"
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
                        <i class="fa  <% vm.user.id ? 'fa-save' : 'fa-plus' %>"></i> &nbsp;
                        <% vm.user.id ? 'Editare' : 'Creare' %> user
                    </button>
                </div>
            </div>
        </div>
    </div>

</script>

<script type="text/javascript">
    angular.module('app')
        .controller('ManageUserController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance', 'resolveUser','FileUploader',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance,
                      resolveUser, FileUploader) {

                var vm = this;
                vm.user = angular.copy(resolveUser);
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
                    vm.user.image = vm.file.id;
                    vm.loadingFiles = false;
                };

                vm.taToolbar = [
                    ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'pre', 'quote'],
                    ['bold', 'italics', 'underline', 'strikeThrough', 'ul', 'ol', 'redo', 'undo', 'clear'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'indent', 'outdent', 'html', 'insertImage']
                ];
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

                function cancel() {
                    $uibModalInstance.dismiss();
                }

                function ok() {
                    var data = angular.copy(vm.user);
                    delete data.repeatPassword;

                    return $http({
                        method: (vm.user.id ? 'PUT' : 'POST'),
                        url: "ajax/users" + (vm.user.id ? '/' + vm.user.id : ''),
                        data: data
                    })
                        .then(function () {
                            toaster.success((vm.user.id ? 'Editare' : 'Creare') + ' cont cu succes cu success!');
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