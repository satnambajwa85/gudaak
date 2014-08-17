<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
			<tr class="text-center">
				<td width="25%" class="text-center ">
					<h5 class="semibold mt5 mb5 text-tealmedium">Pricing Zone</h5>
				</td>
				<td width="25%" class="text-center">                                                    
					<h5 class="semibold mt5 mb5 pl15 text-tealmedium text-center">Enterprise Grade</h5>
					<small class="text-muted">
						<ul class="text-left">
							<li class="list">Clientele: Fortune 1000</li>
							<li class="list">5 years in business</li>
							<li class="list">Experience in scalability & high compliance domains</li>
						</ul>
					</small>
				</td>
				<td width="25%" class="text-center">                
					<h5 class="semibold mt5 mb5 pl15 text-tealdark">Mid-Market Grade</h5>
					<small class="text-muted">
						<ul class="text-left">
							<li class="list">Clientele: Mid-market companies & funded startups</li>
							<li class="list">3 years in business</li> 
							<li class="list">Exposure to scalability & high compliance domains</li>
						</ul>
					</small>
				</td>
				<td width="25%" class="text-center">                
					<h5 class="semibold mt5 mb5 pl15 text-tealdarker">StartUp Grade</h5>
					<small class="text-muted">
						<ul class="text-left">
							<li class="list">Clientele: Startups</li>
							<li class="list">1 year in business</li>
							<li class="list">Basic knowledge about compliance and security</li>
						</ul>
					</small>
				</td>
			</tr>
		</thead>
        <tbody>
            <?php 
			for($i=1;$i<4;$i++){
				if(array_key_exists($i,$list)){
					$item=	$list[$i];
					?>
				<tr>
					<td class="border-none">
						<div class="form-wizard text-center">
							<h5 class="semibold mt5 mb5 pl15 text-tealmedium text-center<?php echo $item['id'];?>"><?php echo $item['title'];?> </h5>
						</div>
						<div class="form-wizard text-center">
							<?php 
							if($preference=='city'){?>
									<a href="javascript:void();" class="label text-muted"><?php echo $city;?></a>
								<?php 
							}elseif($preference=='country'){?>
									<a href="javascript:void();" class="label text-muted"><?php echo $countryName;?></a>
								<?php 
							}else{
								$region	=	array();
								foreach($item['country'] as $country){
									$region[$country->name]	=	$country->name;
								}
								foreach($region as $name){?>
									<a href="javascript:void();" class="label text-muted"><?php echo $name;?></a>
								<?php }
								}?>
						</div>
					</td>
	
	
					<?php foreach($item['tier'] as $tier){?>
					<td class="text-center table_cell bgcolor-tealmedium<?php echo $item['id'];?> ">
						<h5 class="semibold ">$<?php echo $tier->min_price;?> - $<?php echo $tier->max_price;?><small class="text-white"> / hour</small></h5>
						<p><?php echo $tier->description;?></p>
						<span class="checkbox custom-checkbox custom-checkbox-white mt5">
							<input type="checkbox" data-parsley-multiple="sa3" id="customcheckbox_wb<?php echo $tier->id;?>" value="<?php echo $tier->id;?>" name="tier[]" data-parsley-id="3576" <?php echo (in_array($tier->id,$sel))?'checked="checked"':'';?> class="require-one1" >
							<label title="" data-placement="top" data-toggle="tooltip" for="customcheckbox_wb<?php echo $tier->id;?>" data-original-title="Select your tier"></label>
						</span>
					</td>
					<?php } ?>
				   
				</tr>
				<?php 
				}else{
				$zone	=	PriceZone::model()->findByPk($i);	
				$tiers	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$i));?>
				<tr>
                <td class="border-none">
					<div class="form-wizard text-center">
						<h5 class="semibold mt5 mb5 pl15 text-tealmedium text-center"> <?php echo $zone->title;?></h5>
					</div>
					<div class="form-wizard text-center">
						<a href="javascript:void();" class="label text-muted"></a>
					</div>
				</td>

                <?php foreach($tiers as $tier){?>
                <td class="text-center table_cell bgcolor-grey">
						<h5 class="semibold ">$<?php echo $tier->min_price;?> - $<?php echo $tier->max_price;?><small class="text-white"> / hour</small></h5>
						<p><?php echo $tier->description;?></p>						
					</td>
                <?php } ?>
               
            </tr>
			<?php 
			}
			}?>
        </tbody>
    </table>
</div>
            