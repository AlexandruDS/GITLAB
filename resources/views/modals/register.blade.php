<script type="text/ng-template" id="register.html">

    <!-- Modal Box Start-->
    <div class="modal-content">
        <div class="modal-header">
            <h3>Creare cont</h3>
        </div>
        <div class="modal-body">
            <form method="get" class="tnit-modal-form" data-ng-submit="vm.createAccount()">
                <div class="inner-holder">
                    <label>Nume</label>
                    <input type="text" data-ng-model="vm.user.first_name" style="color:black" name="email">
                </div>
                <div class="inner-holder">
                    <label>Prenume</label>
                    <input type="text" data-ng-model="vm.user.last_name" style="color:black" name="email">
                </div>
                <div class="inner-holder">
                    <label>Email</label>
                    <input type="email" data-ng-model="vm.user.email" style="color:black" name="email">
                </div>
                <div class="inner-holder">
                    <label>Parola</label>
                    <input type="password" data-ng-model="vm.user.password" style="color:black">
                </div>

                <div class="inner-holder">
                    <label>Repeta parola</label>
                    <input type="password" data-ng-model="vm.user.repeatPassword" style="color:black">
                </div>

                <div class="inner-holder">
                    <button class="btn-register pull-left"
                            style="background: darkgrey" type="button" data-ng-click="vm.openLoginModal()">
                        Autentificare
                    </button>
                    <button class="btn-register" type="submit">Creare cont</button>
                </div>
            </form>
        </div>
        <p style="padding: 20px; font-size: 14px; border-top: solid 1px lightgrey">*Va rugam sa ne contactati pe mail sau telefonic cand doriti o sedinta de coaching sau folosind <a href="contact">formularul de contact </a> </p>

    </div>

</script>

<script type="text/javascript">
    angular.module('app')
        .controller('RegisterController', ['$http', '$timeout', '$q', '$filter', 'toastr', '$scope', '$window',
            '$interval', '$uibModal', '$uibModalInstance',
            function ($http, $timeout, $q, $filter, toaster, $scope, $window, $interval, $uibModal, $uibModalInstance) {
                var vm = this;


                vm.createAccount = createAccount;
                vm.openLoginModal = openLoginModal;

                activate();

                function activate() {
                    return getUser();
                }

                function openLoginModal() {
                    $uibModalInstance.close();
                    var modalInstance = $uibModal.open({
                        animation: true,
                        ariaLabelledBy: 'modal-title',
                        ariaDescribedBy: 'modal-body',
                        templateUrl: 'login.html',
                        controller: 'LoginController',
                        controllerAs: 'vm',
                        size: 'md',
                        resolve: {
                            user: function () {
                                return null
                            }
                        }
                    });

                    modalInstance.result.then(function () {
                    }, function () {
                    });

                }


                function createAccount() {
                    var data = angular.copy(vm.user);
                    delete data.repeatPassword;
                    return $http({
                        method: "POST",
                        url: "ajax/users",
                        data: data
                    })
                        .then(function () {
                            toaster.success('Creare cont cu succes cu success!');
                            setTimeout(function () {
                                $window.location.href = '{!! ($languageCode == 'ro') ? 'contul-meu' : 'my-account' !!}';
                            }, 1000);

                        }).catch(function (error) {
                            toaster.error(error.data.message);
                        });
                }


                function getUser() {
                    return $http({
                        method: "GET",
                        url: "ajax/me",
                        params: {}
                    })
                        .then(function (response) {
                            vm.user = response.data;

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