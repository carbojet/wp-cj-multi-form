<?php
add_action('wp_head','wc_adon_city_frontend_script');
function wc_adon_city_frontend_script(){
    if(get_option('cj_form_field_and_values')){
        $formFields = unserialize( get_option('cj_form_field_and_values'));
    }
     wp_enqueue_script('jquery');
     wp_enqueue_style('cj-multi-setp-form-css',plugins_url('resource/css/style.css',__FILE__));
     wp_enqueue_script('cj-multi-setp-form-js',plugins_url('resource/js/script.js',__FILE__));
     wp_localize_script('cj-multi-setp-form-js','localjsvar',array(
                                                'ajaxUrl'=>admin_url('admin-ajax.php'),
                                                'dropfields'=>$formFields,
												));
}
add_shortcode('cj-multi-step-form',function (){
	if(get_option('cj_form_field_and_values')){
		$formFields = unserialize( get_option('cj_form_field_and_values'));
	}
	?>
	<form method="post" action="">
		<div class="form-wrap">
			<div class="cj-form-head">
				<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">
					</div>		
				</div>
			</div>
			<div class="cj-form-body">
				<div class="cj-form-row">				
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Select Material:</label>
									<select name="cj_material">
										<option value="">Select from List</option>
										<?php
											if(isset($formFields['cj_material'])){
												$cj_material = explode(',',$formFields['cj_material']);
												foreach($cj_material as $value){?>
												<option value="<?php echo $value;?>"><?php echo $value;?></option>
												<?php }
											}
										?>
									</select>
								</div>					
							</div>
							<div class="elementor-column elementor-col-20"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group cj_grade_finish">
									<label>Grade & Finish:</label>
									<select name="cj_grade_finish">
										<option value="">Select from List</option>							
									</select>
									<div class="other">
										<input type="text" name="cj_grade_finish_other" placeholder="Mention Here">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group cj_shapes">
									<label>Form :</label>
									<select name="cj_shapes">
										<option value="">Select form List</option>
										<?php
											if(isset($formFields['cj_form'])){
												$cj_shapes = explode(',',$formFields['cj_form']);
												foreach($cj_shapes as $value){?>
												<option value="<?php echo $value;?>"><?php echo $value;?></option>
												<?php }
											}
										?>
									</select>
								</div>					
							</div>
							<div class="elementor-column elementor-col-20"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<ul class="shapes-options">
									<li>	
										<div class="elementor-field-group">
											<label>Diameter:</label>
											<select name="cj_diameter" data-label="Diameter">
												<?php
													if(isset($formFields['cj_diameter'])){
														$cj_diameter = explode(',',$formFields['cj_diameter']);
														foreach($cj_diameter as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Length (mm):</label>
											<input type="text" name="cj_length" placeholder="6000mm max" data-label="Length" class="show-quantity" />
										</div>
									</li>
									<li>
										<div class="elementor-field-group">
											<label>Width:</label>
											<select name="cj_width" data-label="Width">
												<?php
													if(isset($formFields['cj_width'])){
														$cj_width = explode(',',$formFields['cj_width']);
														foreach($cj_width as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Height:</label>
											<select name="cj_height" data-label="Height">
												<?php
													if(isset($formFields['cj_height'])){
														$cj_height = explode(',',$formFields['cj_height']);
														foreach($cj_height as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Length (mm):</label>
											<input type="text" name="cj_length" placeholder="6000mm max" data-label="Length" class="show-quantity" />
										</div>
									</li>
									<li>
										<div class="elementor-field-group">
											<label>Dimension :</label>
											<select name="cj_dimension" data-label="Dimension" class="show-quantity">
												<option value="">Select from List</option>
												<?php
													if(isset($formFields['cj_dimension'])){
														$cj_dimension = explode(',',$formFields['cj_dimension']);
														foreach($cj_dimension as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Length (mm):</label>
											<input type="text" name="cj_length" placeholder="6000mm max" data-label="Length" class="show-quantity" />
										</div>							
									</li>
									<li>
										<div class="elementor-field-group">
											<label>Outside Diameter:</label>
											<select name="cj_outside_diameter" data-label="Outside-Diameter">
												<?php
													if(isset($formFields['cj_outside_diameter'])){
														$cj_outside_diameter = explode(',',$formFields['cj_outside_diameter']);
														foreach($cj_outside_diameter as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Wall Thickness:</label>
											<select name="cj_wall_thikness" data-label="Wall-Thickness">
												<?php
													if(isset($formFields['cj_outside_diameter'])){
														$cj_outside_diameter = explode(',',$formFields['cj_outside_diameter']);
														foreach($cj_outside_diameter as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Length (mm):</label>
											<input type="text" name="cj_length" placeholder="6000mm max" data-label="Length" class="show-quantity"/>
										</div>
									</li>
									<li>
										<div class="elementor-field-group">
											<label>Width:</label>
											<select name="cj_width" data-label="Width">
												<?php
													if(isset($formFields['cj_width'])){
														$cj_width = explode(',',$formFields['cj_width']);
														foreach($cj_width as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Height:</label>
											<select name="cj_height" data-label="Height">
												<?php
													if(isset($formFields['cj_height'])){
														$cj_height = explode(',',$formFields['cj_height']);
														foreach($cj_height as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Thickness:</label>
											<select name="cj_thickness" data-label="Thickness" class="show-quantity">
												<?php
													if(isset($formFields['cj_thickness'])){
														$cj_thickness = explode(',',$formFields['cj_thickness']);
														foreach($cj_thickness as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
									</li>
									<li>
										<div class="elementor-field-group">
											<label>Width:</label>
											<select name="cj_width" data-label="Width">
												<?php
													if(isset($formFields['cj_width'])){
														$cj_width = explode(',',$formFields['cj_width']);
														foreach($cj_width as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Height:</label>
											<select name="cj_height" data-label="Height">
												<?php
													if(isset($formFields['cj_height'])){
														$cj_height = explode(',',$formFields['cj_height']);
														foreach($cj_height as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
										<div class="elementor-field-group">
											<label>Thickness:</label>
											<select name="cj_thickness" data-label="Thickness" class="show-quantity">
												<?php
													if(isset($formFields['cj_thickness'])){
														$cj_thickness = explode(',',$formFields['cj_thickness']);
														foreach($cj_thickness as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>
									</li>
									<li>
										<div class="elementor-field-group">
											<label>Select Fittings:</label>
											<select name="cj_fittings" data-label="Fittings" >
												<option value="">Select from List</option>
												<?php
													if(isset($formFields['cj_fittings'])){
														$cj_fittings = explode(',',$formFields['cj_fittings']);
														foreach($cj_fittings as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
											<div class="other">
												<input type="text" name="cj_fittings_other" placeholder="Mention Here" data-label="Fittings-Other">
											</div>
										</div>
										<div class="elementor-field-group">
											<label>Dimension :</label>
											<select name="cj_dimension" data-label="Dimension" class="show-quantity">
												<option value="">Select from List</option>
												<?php
													if(isset($formFields['cj_dimension'])){
														$cj_dimension = explode(',',$formFields['cj_dimension']);
														foreach($cj_dimension as $value){?>
														<option value="<?php echo $value;?>"><?php echo $value;?></option>
														<?php }
													}
												?>
											</select>
										</div>								
									</li>
								</ul>										
							</div>
						</div>
					</div>
					<div class="elementor-row cj_quantity">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Quantity:</label>
									<input type="text" name="cj_quantity" />
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Comment (optional):</label>
									<textarea name="form_comments"></textarea>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-row-tool">
						<span class="edit-form-row"><i class="fa fa-pencil"></i></span>
						<span class="remove-form-row"><i class="fa fa-trash"></i></span>
						<span class="update-form-row"><i class="fa fa-save"></i></span>
					</div>
				</div>
				<!-- add more button row-->
				<div class="cj_add_more">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">							
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<button type="button" name="cj_add_more" class="button" disabled>Add Another Item</button>
									<button type="button" name="cj_next_delivery_detail" class="button" disabled>Next Delivery Detail</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end here -->
				<div class="cj-form-delivery-detail">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<h5>Delivery details ( * Mark are Mandatory)</h5>
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group required">
									<label>Name *:</label>
									<input type="text" name="cj_username" />
									<span class="help-block">Please Fill Name</span>
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Company :</label>
									<input type="text" name="cj_company" />
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group required">
									<label>Email *:</label>
									<input type="email" name="cj_email" />
									<span class="help-block">Please Fill Email address</span>
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Phone :</label>
									<input type="tel" name="cj_phone" />
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>When Do You Need It?:</label>
									<input type="date" name="cj_datetimepick" />
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<!--
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Where Ship to?:</label>
									<input type="text" name="cj_deliverwhere" />
								</div>
							</div>
							-->
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Address 1:</label>
									<input type="text" name="cj_address1" />
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Address 2:</label>
									<input type="text" name="cj_address2" />
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>City:</label>
									<input type="text" name="cj_city" />
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>Country:</label>
									<select name="cj_country">
										<option value=""></option>
										<option value="Sweden">Sweden</option>
										<option value="Spain">Spain</option>
										<option value="Italy">Italy</option>
										<option value="Germany">Germany</option>
										<option value="Denmark">Denmark</option>
										<option value="Israel">Israel</option>
										<option value="Eritrea">Eritrea</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">				
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group required">
									<label>ZIP / Postal Code *:</label>
									<input type="text" name="cj_zipcode" />
									<span class="help-block">Please Fill Zipcode</span>
								</div>
							</div>
							<div class="elementor-column elementor-col-20 elementor-form-fields-wrapper"></div>
							<div class="elementor-column elementor-col-40 elementor-form-fields-wrapper">
								<div class="elementor-field-group">
									<label>State / Province / Region:</label>
									<input type="text" name="cj_state" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-footer">
				<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">
						<button type="button" name="submit_cj_form" class="button">SUBMIT <span class="loading"><i class="fas fa-spinner fa-spin"></i></span></button>
					</div>
					<div class="elementor-column elementor-col-100 elementor-inner-column elementor-element">
						<p class="mail-message">We have received your requiremnt some one will get back with your mentioned email address</p>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php
});

function wpb_sender_name( $original_email_from ) {
    return 'Alloybuy';
}
add_action( 'wp_ajax_nopriv_cj_mail_sendform', 'cj_mail_sendform' );
add_action( 'wp_ajax_cj_mail_sendform', 'cj_mail_sendform' );
function cj_mail_sendform(){
	
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

	//add_filter( 'wp_mail_from_name', 'wpb_sender_name' );
	$cjForm = $_POST["cjForm"];
	$html ='<table>';
	$rows = $cjForm["rows"];
	if(count($rows)>0){
		foreach($rows as $k=>$row){
			$html .='<tr><td>Material</td><td>'.$row["Material"].'</td></tr>';
			$html .='<tr><td>Grade & Finish</td><td>'.$row["Grade-Finish"].'</td></tr>';
			$html .='<tr><td>Form</td><td>'.$row["Form"].'</td></tr>';
			$html .='<tr><td>Dimentions and Units</td><td></td></tr>';
			foreach($row["Dimentions-and-Units"] as $subrow){
				foreach($subrow as $kn=>$val){
					$html .='<tr><td>'.$kn.'</td><td>'.$val.'</td></tr>';
				}
			}
			$html .='<tr><td>Quantity</td><td>'.$row["Quantity"].'</td></tr>';
			$html .='<tr><td>Comment</td><td>'.$row["Comment"].'</td></tr>';
			$html .='</tr>';
			$html .='<tr><td colspan="2">-------------------------------------------</td></tr>';
		}
	}
	$html .='<tr><td>Name</td><td>'.$cjForm["Name"].'</td></tr>';
	$html .='<tr><td>Company</td><td>'.$cjForm["Company"].'</td></tr>';
	$html .='<tr><td>Email</td><td>'.$cjForm["Email"].'</td></tr>';
	$html .='<tr><td>Phone</td><td>'.$cjForm["Phone"].'</td></tr>';
	$html .='<tr><td>Date</td><td>'.$cjForm["date"].'</td></tr>';
	//$html .='<tr><td>Place to Ship</td><td>'.$cjForm["Place-to-Ship"].'</td></tr>';
	$html .='<tr><td>Address 1</td><td>'.$cjForm["Address-1"].'</td></tr>';
	$html .='<tr><td>Address-2</td><td>'.$cjForm["Address-2"].'</td></tr>';
	$html .='<tr><td>City</td><td>'.$cjForm["City"].'</td></tr>';
	$html .='<tr><td>State</td><td>'.$cjForm["State"].'</td></tr>';
	$html .='<tr><td>Postal Code</td><td>'.$cjForm["Postal-Code"].'</td></tr>';
	$html .='<tr><td>Country</td><td>'.$cjForm["Country"].'</td></tr>';
	$html .='</table>';
	
	//$to = get_option('admin_email');
	$to = 'quote@alloybuy.com,opencodetreat@gmail.com';
	$subject = 'Quote from '.$cjForm["Name"].' #'.$randomString;
	$body = $html;
	
	$headers = array('From: Alloybuy <noreply@alloybuy.com>','Content-Type: text/html; charset=UTF-8');	
	$res = wp_mail( $to, $subject, $body, $headers );
	
	wp_send_json_success($res);
}