<script type="text/ng-template" id="create-session.html">
    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-header">
            <h3>Creare sesiune noua</h3>
        </div>
        <div class="modal-body">
            <!--Modal Form Start-->
            <form method="get" class="tnit-modal-form" data-ng-submit="vm.createSession()">
                <div class="inner-holder">
                    <label>Titlu</label>
                    <input type="text" data-ng-model="vm.data.title" class="form-control">
                </div>
                <div class="inner-holder">
                    <label>Descriere</label>
                    <div text-angular
                         data-ng-model="vm.data.content"
                         ta-toolbar="vm.taToolbar"
                         ta-text-editor-class="form-control small-height"
                         ta-html-editor-class="form-control small-height">
                    </div>
                </div>

                <div class="inner-holder">
                    <label>Participanti</label>
                    <ui-select multiple ng-model="vm.data.participants" theme="bootstrap" ng-disabled="ctrl.disabled"
                               close-on-select="false" style="width: 800px;" title="Choose a person">
                        <ui-select-match placeholder="Select person..."><%$item.first_name%> <%$item.last_name%>
                        </ui-select-match>
                        <ui-select-choices
                                repeat="person in vm.users | filter: $select.search">
                            <div ng-bind-html="person.first_name + ' ' + person.last_name | highlight: $select.search"></div>
                            <small>
                                Email: <%person.email%>
                            </small>
                        </ui-select-choices>
                    </ui-select>
                </div>
                <div class="inner-holder">
                    <button class="btn-register" type="submit">Creare sesiune</button>
                </div>
            </form><!--Modal Form End-->
        </div>

    </div>
</script>


<script type="text/javascript">
    angular.module('app')
        .controller('CreateSessionController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal) {
                var vm = this;

                vm.users = [];

                vm.createSession = createSession;
                vm.taToolbar = [
                    ['h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'pre', 'quote'],
                    ['bold', 'italics', 'underline', 'strikeThrough', 'ul', 'ol', 'redo', 'undo', 'clear'],
                    ['justifyLeft', 'justifyCenter', 'justifyRight', 'indent', 'outdent', 'html', 'insertImage']
                ];
                activate();

                function activate() {
                    return getUsers();
                }


                function createSession() {
                    return $http({
                        method: "POST",
                        url: "ajax/sessions",
                        data: vm.data
                    })
                        .then(function (response) {
                            toaster.success('Sesiune creata cu success!');
                            setTimeout(function () {
                                $window.location.href = '{!! ($languageCode == 'ro') ? 'sesiunile-mele' : 'my-sessions' !!}';
                            }, 1000);

                        }).catch(function (error) {
                        });
                }


                function getUsers() {
                    return $http({
                        method: "GET",
                        url: "ajax/users",
                        params: {}
                    })
                        .then(function (response) {
                            vm.users = response.data;

                        }).catch(function (error) {
                            //    toaster.error('Eroare incarcare user!', 'Incarcare user');
                        });
                }


            }
        ])
    ;
</script>

<style>

    .tnit-modal-form, .tnit-modal-form .inner-holder {
        float: none !important;
    }

    .form-control {
        border-radius: 0px !important;
        border: 1px solid #ccc !important;
    }

    .ui-select-container {
        width: auto !important;
        padding: 6px !important;
        font-size: 14px !important;
    }

    .ui-select-match-item {
        font-size: 14px !important;
    }

    .ui-select-match-close {
        margin-top: 2px;
    }

    input {
        color: black !important;
    }
</style>