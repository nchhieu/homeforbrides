<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$this->breadcrumbs=array(
	'Setting'=>array('setting'),
);
?>

<div class="dashboard-widget">
<div class='span12'>
  <div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'> <i class='icon-dashboard'></i> <span>Dashboard</span> </h1>
  </div>
  <div class='row-fluid'>
    <div class='span12 box box-transparent'>
      <div class='row-fluid'>
        <div class='span2 box-quick-link blue-background'><?php echo CHtml::link('<div class="header"><div class="icon-cogs"></div></div><div class="content">General Settings</div>', array('Suburb/admin')); ?></div>
        <div class='span2 box-quick-link green-background'><?php echo CHtml::link('<div class="header"><div class="icon-globe"></div></div><div class="content">State</div>', array('State/admin')); ?></div>
        <div class='span2 box-quick-link orange-background'><?php echo CHtml::link('<div class="header"><div class="icon-magic"></div></div><div class="content">Suburb</div>', array('Suburb/admin')); ?></div>
        <div class='span2 box-quick-link purple-background'><?php echo CHtml::link('<div class="header"><div class="icon-home"></div></div><div class="content">Property Type</div>', array('settingPropertyType/admin')); ?></div>
        <div class='span2 box-quick-link red-background'><?php echo CHtml::link('<div class="header"><div class="icon-inbox"></div></div><div class="content">Air Condition</div>', array('SettingAircondition/admin')); ?></div>
        <div class='span2 box-quick-link muted-background'><?php echo CHtml::link('<div class="header"><div class="icon-wrench"></div></div><div class="content">Property Construction</div>', array('SettingConstruction/admin')); ?></div>
      </div>
    </div>
  </div>
  
  <div class='row-fluid'>
    <div class='span12 box box-transparent'>
      <div class='row-fluid'>
        <div class='span2 box-quick-link blue-background'><?php echo CHtml::link('<div class="header"><div class=" icon-resize-full"></div></div><div class="content">Property Land Size</div>', array('settingLandSize/admin')); ?></div>
        <div class='span2 box-quick-link green-background'><?php echo CHtml::link('<div class="header"><div class="icon-star"></div></div><div class="content">Motivation</div>', array('settingMotivation/admin')); ?></div>
        <div class='span2 box-quick-link orange-background'><?php echo CHtml::link('<div class="header"><div class="icon-magic"></div></div><div class="content">Property Pool</div>', array('settingPool/admin')); ?></div>
        <div class='span2 box-quick-link purple-background'><?php echo CHtml::link('<div class="header"><div class="icon-dollar"></div></div><div class="content">Price From</div>', array('settingPriceRangeFrom/admin')); ?></div>
        <div class='span2 box-quick-link red-background'><?php echo CHtml::link('<div class="header"><div class="icon-dollar"></div></div><div class="content">Price To</div>', array('settingPriceRangeTo/admin')); ?></div>
        <div class='span2 box-quick-link muted-background'><?php echo CHtml::link('<div class="header"><div class="icon-puzzle-piece"></div></div><div class="content">Property Style</div>', array('SettingPropertyStyle/admin')); ?></div>
      </div>
    </div>
  </div>
  
  <div class='row-fluid'>
    <div class='span12 box box-transparent'>
      <div class='row-fluid'>
        <div class='span2 box-quick-link blue-background'><?php echo CHtml::link('<div class="header"><div class="icon-th-large"></div></div><div class="content">Property Zoning</div>', array('SettingZoning/admin')); ?></div>
        <div class='span2 box-quick-link green-background'><?php echo CHtml::link('<div class="header"><div class="icon-group"></div></div><div class="content">Seller Vendor</div>', array('settingSellerVendor/admin')); ?></div>
        <div class='span2 box-quick-link orange-background'><?php echo CHtml::link('<div class="header"><div class="icon-star"></div></div><div class="content">Buyer Rating</div>', array('settingBuyerRating/admin')); ?></div>
      </div>
    </div>
  </div>
</div>
</div>

