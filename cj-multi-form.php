<?php
/**
* plugin name: CJ Multi Stage Form
* Author: M Sunil Kumar
* Description: It allow you to manage filed values which belongs to respectiv form.
*/
require_once plugin_dir_path(__FILE__).'template/form.php';

add_action('admin_init','cj_add_script');
function cj_add_script(){  
    wp_enqueue_script('cj_prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    wp_enqueue_style('cj_prefix_bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
}
add_action('admin_menu', 'wp_cj_add_submenu');
function wp_cj_add_submenu(){

	add_menu_page(
        'CJ Form Filed Manager',
        'CJ Forms',
        'manage_options',
        'cj-form-field-management',
		'get_cj_form_fields');
}


function get_cj_form_fields(){
    $nds_add_meta_nonce = wp_create_nonce( 'nds_add_user_meta_form_nonce' ); 
    if(isset( $_POST['nds_add_user_meta_nonce'] ) && wp_verify_nonce( $_POST['nds_add_user_meta_nonce'], 'nds_add_user_meta_form_nonce') ) {
        $form = $_POST;
        unset($form['action']);
        unset($form['nds_add_user_meta_nonce']);
        unset($form['add_fileds_to_cj_form']);
        update_option('cj_form_field_and_values',serialize($form));        
    }
    if(get_option('cj_form_field_and_values')){
        $formFields = unserialize( get_option('cj_form_field_and_values'));
    }
    
    ?>
        <style>
            .panel-body{
                height: 200px;
                overflow: auto;
            }
            .panel-body textarea {
                height: 100%;
            }
        </style>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin.php?page=cj-form-field-management' ) ); ?>">
        <div class="container">
            <input type="hidden" name="action" value="nds_form_response">
		    <input type="hidden" name="nds_add_user_meta_nonce" value="<?php echo $nds_add_meta_nonce ?>" />
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Material</div>
                        <div class="panel-body">
                            <textarea name="cj_material" class="form-control"><?php if(isset($formFields['cj_material'])) echo stripslashes($formFields['cj_material']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Grade & Finish</div>
                        <div class="panel-body">
                                <?php
                                    if(isset($formFields['cj_material'])){
                                        $cj_material = explode(',',$formFields['cj_material']);
                                        foreach($cj_material as $k=>$value){
                                            if(isset($formFields['cj_grade_and_finish'])){
                                                ?>
                                                    <label><?php echo $value;?></label>
                                                    <textarea name="cj_grade_and_finish[]" class="form-control"><?php if(isset($formFields['cj_grade_and_finish'][$k])) echo stripslashes($formFields['cj_grade_and_finish'][$k]); ?></textarea>
                                                <?php
                                            }
                                        }
                                    }
                                ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Form</div>
                        <div class="panel-body">
                            <textarea name="cj_form" class="form-control"><?php if(isset($formFields['cj_form'])) echo stripslashes($formFields['cj_form']); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Diameter</div>
                        <div class="panel-body">
                            <textarea name="cj_diameter" class="form-control"><?php if(isset($formFields['cj_diameter'])) echo stripslashes($formFields['cj_diameter']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Width</div>
                        <div class="panel-body">
                            <textarea name="cj_width" class="form-control"><?php if(isset($formFields['cj_width'])) echo stripslashes($formFields['cj_width']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Height</div>
                        <div class="panel-body">
                            <textarea name="cj_height" class="form-control"><?php if(isset($formFields['cj_height'])) echo stripslashes($formFields['cj_height']); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thickness</div>
                        <div class="panel-body">
                            <textarea name="cj_thickness" class="form-control"><?php if(isset($formFields['cj_thickness'])) echo stripslashes($formFields['cj_thickness']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dimension</div>
                        <div class="panel-body">
                            <textarea name="cj_dimension" class="form-control"><?php if(isset($formFields['cj_dimension'])) echo stripslashes($formFields['cj_dimension']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Outside Diameter</div>
                        <div class="panel-body">
                            <textarea name="cj_outside_diameter" class="form-control"><?php if(isset($formFields['cj_outside_diameter'])) echo stripslashes($formFields['cj_outside_diameter']); ?></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Wall Thickness</div>
                        <div class="panel-body">
                            <textarea name="cj_wall_thickness" class="form-control"><?php if(isset($formFields['cj_wall_thickness'])) echo stripslashes($formFields['cj_wall_thickness']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Fittings</div>
                        <div class="panel-body">
                            <textarea name="cj_fittings" class="form-control"><?php if(isset($formFields['cj_fittings'])) echo stripslashes($formFields['cj_fittings']); ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Redirect URL</div>
                        <div class="panel-body">
                            <input name="cj_form_redirect" class="form-control" value="<?php if(isset($formFields['cj_form_redirect'])) echo $formFields['cj_form_redirect']; ?>" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <button name="add_fileds_to_cj_form" type="submit" class="button button-primary">Save</button>
                </div>
            </div>
        </div>
        </form>
    <?php
}