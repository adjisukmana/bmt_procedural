<?php 
    $sql=mysql_query("SELECT *, v.id_variable as id_variable,
                        v.variable_alias as variable_alias,
                        v.variable_name as variable_name ,
                        vv.variable_value_alias as variable_value_alias 
                        FROM variable v 
                        JOIN variable_value vv ON v.id_variable = vv.id_variable 
                        WHERE v.id_variable = '$_GET[id_variable]'");
    $data=mysql_fetch_array($sql);
?>

<div class="row" ng-app="variableValue">
    <form method="POST" action='dynamic_aksi.php?module=dynamic_variable&act=input' ng-controller="MainCtrl">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2>Tambah Variable<small>Silahkan isi data variable baru melalui form dibawah ini.</small></h2>
            </div>
            <!-- CONTENT -->
            <div class="card-body card-padding">
            <div class="row m-10">
                <div class="col-sm-12"> 
                    <div class="pmbb-edit">
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">ID Variable</dt>
                            <dd>                  
                                <div class="input-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Masukkan ID Variable ..." name='id_variable' value="<?php echo $data['id_variable']; ?>" readonly="readonly">
                                    </div>
                                    <span class="input-group-addon"><i class="md md-format-list-numbered"></i></span>
                                </div>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">Alias Variable</dt>
                            <dd>                  
                                <div class="input-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Masukkan alias variable ..." name='variable_alias' ng-model="variable_alias" ng-change="change()" value="">
                                    </div>
                                    <span class="input-group-addon"><i class="md  md-person"></i></span>
                                </div>
                            </dd>
                        </dl>
                        <dl class="dl-horizontal">
                            <dt class="p-t-10">Nama Variable</dt>
                            <dd>                  
                                <div class="input-group">
                                    <div class="fg-line">
                                        <input type="text" class="form-control" placeholder="Masukkan nama variable ..." name='variable_name' value="{{ variable_name  | lowercase | removeSpaces}}">
                                    </div>
                                    <span class="input-group-addon"><i class="md  md-person"></i></span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
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
                <div class="row" >
                    <div class="input_fields_wrap" ng-app="angularjs-starter" ng-controller="MainCtrl">
                    <table class="table table-responsive table-bordered table-striped">
                    <thead>
                        <tr>
                            <td style="width:50px;">
                                <dl class="">
                                    <dt class="p-t-10">No</dt>
                                </dl>
                            </td>
                            <td style="width:50px;">
                                <dl class="">
                                    <dt class="p-t-10">Id</dt>
                                </dl>
                            </td>
                            <td>
                                <dl class="dl-horizontal fg-line">
                                    <dt class="p-t-10">Nama Alias</dt>
                                </dl>
                            </td>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-ng-repeat="choice in choices">
                            <td>
                               <p class="p-t-5"><strong>{{choice.no}}</strong></p>
                            </td>
                            <td>
                                <input type="text" name='variable_array[]' class="form-control"  placeholder="Masukkan id variable ..." value="{{ choice.id_variable_value }}" readonly="readonly">
                            </td>
                            <td>
                                <div class="fg-line">
                                    <input type="text" name="variable_value_alias[]" class="form-control" ng-model="choice.variable_value_alias_loop" placeholder="Masukkan alias ..." value="{{choice.variable_value_alias}}">
                                </div>
                            </td>
                            <td>
                                <div class="fg-line">
                                    <input type="text" name='variable_value_transformation[]' class="form-control"  placeholder="Masukkan transformasi data ..." value="{{choice.variable_value_alias_loop}}">
                                </div>
                            </td>
                            <td>
                                <div class="fg-line">
                                    <input type="text" name="variable_value_name[]" class="form-control"  placeholder="Masukkan nama variable value..." value="{{choice.variable_value_alias_loop | lowercase | removeSpaces}}">
                                </div>
                            </td>
                            <td>
                                <button class="remove btn btn-danger btn-icon-text btn-sm pull-right waves-effect" ng-show="$last" ng-click="removeChoice()"><i class="md md-remove"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                       <span class="clearfix"></span>
                       <a class="addfields btn btn-primary btn-icon-text btn-sm waves-effect m-t-10"  ng-click="addNewChoice()"><i class="md md-add"></i> Tambah</a>
                       <span class="clearfix"></span>
                           <!-- 
                       <div id="choicesDisplay m-t-10">
                          {{ choices.id }}
                       </div> -->
                    </div>
                    </form>
                </div>
            </div> <!-- card-body card-padding -->
        </div> <!-- card -->
    </div> <!-- col-md-12 -->
</div> <!-- row -->

<script type="text/javascript">

var app = angular.module('variableValue', []);

  app.controller('MainCtrl', function($scope) {

  $scope.id_variable_value = <?php echo max_id('id_variable_value', 'variable_value'); ?>;
  $scope.variable_alias = "<?php echo $data['variable_alias']; ?>";
  $scope.variable_name = "<?php echo $data['variable_name']; ?>";
  
  $scope.variable_value_alias = "<?php echo $data['variable_value_alias']; ?>";
    $scope.change = function() {
        $scope.variable_name = $scope.variable_alias;
      };

<?php 
    $sql2=mysql_query("SELECT *, v.id_variable as id_variable,
                        v.variable_alias as variable_alias,
                        v.variable_name as variable_name ,
                        vv.variable_value_alias as variable_value_alias,
                        vv.id_variable_value as id_variable_value 
                        FROM variable v 
                        JOIN variable_value vv ON v.id_variable = vv.id_variable 
                        WHERE v.id_variable = '$_GET[id_variable]'");
    while($data2=mysql_fetch_array($sql2)) {
    ?>
    var nomor = 1;
    $scope.choices = [{
                        no: nomor, 
                        id_variable_value: <?php echo $data2['id_variable_value']; ?>, 
                        id: 'choice1'
                    }];
                    nomor++;
    <?php } ?>        
    




  $scope.addNewChoice = function() {
    var newItemNo = $scope.choices.length+1;
    var id_variable_value_plus = ++$scope.id_variable_value;
    $scope.choices.push({'no': +newItemNo, 'id_variable_value': id_variable_value_plus, 'id':'choice'+newItemNo});
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
