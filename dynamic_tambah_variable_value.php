<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Tambah Variable<small>Silahkan isi data variable baru melalui form dibawah ini.</small></h2>
            </div>
            <!-- CONTENT -->
            <div class="card-body card-padding">
            <form method=POST action='dynamic_aksi.php?module=dynamic_variable&act=input' align='center'>
            <div class="row m-10">
                <div class="col-sm-12"> 
                    <div class="pmbb-edit">
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">ID Variable</dt>
                            <dd>                  
                                <div class="input-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Masukkan ID Variable ..." name='id_variable' value="<?php echo max_id('id_variable', 'variable');; ?>">
                                    </div>
                                    <span class="input-group-addon"><i class="md md-format-list-numbered"></i></span>
                                </div>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">Nama Variable</dt>
                            <dd>                  
                                <div class="input-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Variable ..." name='variable_name'>
                                    </div>
                                    <span class="input-group-addon"><i class="md  md-person"></i></span>
                                </div>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">Alias Variable</dt>
                            <dd>                  
                                <div class="input-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Masukkan Alias Variable ..." name='variable_alias'>
                                    </div>
                                    <span class="input-group-addon"><i class="md  md-person"></i></span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            </form>
            </div> <!-- card padding-->
        </div> <!-- card -->
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h2>Setting</h2>
            </div>
            <!-- <div class="alert alert-success" role="alert">Approved</div> -->
            <div class="card-body card-padding">
                <button type="submit" class="btn btn-default btn-icon-text btn-sm waves-effect" data-swal-save=""><i class="md md-menu"></i> Save Draft</button>
                <button type="reset" class="btn btn-danger btn-icon-text btn-sm pull-right waves-effect"><i class="md md-close"></i> Reset</button>
                <hr>
                <div class="sidebar-block m-b-20">
                    <div class="toggle-switch" data-ts-color="blue">
                        <div class="col-xs-4">                  
                            <label for="ts3" class="ts-label">IsActive</label>
                        </div>
                        <div class="col-xs-8">
                            <input id="ts3" type="checkbox" class="m-l-10" hidden="hidden" checked="checked">
                            <label for="ts3" class="ts-helper m-l-10"></label>
                        </div>
                    </div>
                </div>     
            </div><!-- card-body card-padding -->
            <div class="card-header ch-alt">
                <button class="btn btn-default btn-icon-text waves-effect waves-effect" onclick="history.go(-1);"><i class="md md-arrow-back"></i> Back</button>
                <button type="submit" class="btn btn-primary btn-icon-text btn-sm pull-right waves-effect" data-swal-success=""><i class="md md-done-all"></i> Publish</button>
                <div class="clearfix"></div>
            </div><!-- ch-alt -->
        </div>
    </div>
    <span class="clearfix"></span>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2>Tambah Variable Value<small>Silahkan isi data variable value dari yang dipilih melalui form dibawah ini.</small></h2>
            </div>

            <!-- CONTENT -->
            <div class="card-body card-padding">
                <div class="row" ng-app="variableValue">
                    <div class="input_fields_wrap" ng-app="angularjs-starter" ng-controller="MainCtrl">
                    <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>
                                <dl class="dl-horizontal fg-line">
                                    <dt class="p-t-10">Transformasi Data</dt>
                                </dl>
                            </td>
                            <td>
                                <dl class="dl-horizontal fg-line">
                                    <dt class="p-t-10">Nama Variable</dt>
                                </dl>
                            </td>
                            <td>
                                <dl class="dl-horizontal fg-line">
                                    <dt class="p-t-10">Nama Alias</dt>
                                </dl>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-ng-repeat="choice in choices">
                            <td>
                                <div class="fg-line">
                                    <input type="text" name="" class="form-control"  placeholder="Enter mobile number" value="{{choice.name}}">
                                </div>
                            </td>
                            <td>
                                <div class="fg-line">
                                    <input type="text" name="" class="form-control"  placeholder="Enter mobile number" value="{{choice.name | lowercase | removeSpaces}}">
                                </div>
                            </td>
                            <td>
                                <div class="fg-line">
                                    <input type="text" class="form-control" ng-model="choice.name" name="" placeholder="Enter mobile number">
                                </div>
                            </td>
                            <td>
                                <button class="remove btn btn-danger btn-icon-text btn-sm pull-right waves-effect" ng-show="$last" ng-click="removeChoice()"><i class="md md-remove"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                       <span class="clearfix"></span>
                       <button class="addfields btn btn-primary btn-icon-text btn-sm waves-effect m-t-10"  ng-click="addNewChoice()"><i class="md md-add"></i> Tambah</button>
                       <span class="clearfix"></span>
                           
                       <!-- <div id="choicesDisplay m-t-10">
                          {{ choices }}
                       </div> -->
                    </div>
                    
                </div>
            </div> <!-- card-body card-padding -->
        </div> <!-- card -->
    </div> <!-- col-md-12 -->
</div> <!-- row -->

<script type="text/javascript">

var app = angular.module('variableValue', []);

  app.controller('MainCtrl', function($scope) {

  $scope.choices = [{id: 'choice1'}];
  
  $scope.addNewChoice = function() {
    var newItemNo = $scope.choices.length+1;
    $scope.choices.push({'id':'choice'+newItemNo});
  };
    
  $scope.removeChoice = function() {
    var lastItem = $scope.choices.length-1;
    $scope.choices.splice(lastItem);
  };
  
}); app.filter('removeSpaces',function() {
    return function(input) {
        if (input) {
            return input.replace(/\s+/g, '_');    
        }
    }
});

</script>
