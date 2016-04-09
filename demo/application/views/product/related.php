<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <meta charset='UTF-8'>
 </head>

 <body>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <!-- begin loop-->

                                                                                <tr>
                                                                                    <?php $condition = empty($product_relation) || !is_array($product_relation) ? 0 : count($product_relation); ?>
                                                                                    <?php
                                                                                    if ($condition) {
                                                                                        $loop = -1;
                                                                                        foreach ($product_relation as $key) {
                                                                                            $loop++;
                                                                                            ?>
                                                                                            <?php if ($loop && $loop % 3 == 0) { ?></tr>
                                                                                            <tr><td height=10></td></tr>                                                                                            
                                                                                            <tr><td height=10></td></tr>
                                                                                            <tr>
                                                                                            <?php } ?>
                                                                                            <td style="cursor: pointer;"  align=center valign=top width="<?php echo 100 / 3 ?>%">
                                                                                                <?php if ($key["image"]) { ?>
                                                                                                    <div class="product-c-item tooltip_<?= $key['id_related'] ?>" id="<?= $key['id_related'] ?>"
                                                                                                          onclick="window.location.href='/index.php/product_view?id_product=<?= $key['id_related'] ?>'" 
                                                                                                          style="padding: 3px;cursor: pointer;">

                                                                                                        <img src="/<?= $key['image'] ?>" width="100" height="100">
                                                                                                    </div>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $("div.tooltip_<?= $key['id_related'] ?>").easyTooltip({
                                                                                                                useElement: "item_<?= $key['id_related'] ?>"
                                                                                                            });
                                                                                                        });
                                                                                                    </script>                                                                                                    
                                                                                                    <div id="item_<?= $key['id_related'] ?>" class="hidden-tip">
                                                                                                        <div class="title-tooltip"><?= $key['name'] ?></div>
                                                                                                        <div class="content-h-tooltip">
                                                                                                            <span><img width=300 height=300 src=<?= $key['image'] ?>><br>
                                                                                                                Quí khách hàng vui lòng click để xem chi tiết		
                                                                                                            </span>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                <?php } ?>
                                                                                                <?php if ($key["name"]) { ?><div style="padding:1px">																								
                                                                                                    <?php $name = $key['name'];
                                                                                                    if (strlen($name) > 15) echo $name.="..." ?>																								
                                                                                                    </div>
                                                                                                    <div style="padding-bottom:3px"><?php } ?>
                                                                                                    <?php if (!$key["price_out"]) { ?>
                                                                                                            <?php if ($key["price_out"]) { ?>
                                                                                                            <div style="padding-bottom:3px">
                <?php if ($key["memberdc"] > 0) { ?>

                                                                                                                    <span style="color:gray">
                                                                                                                        <strike><?php
                    echo number_format($key["price_out"]);
                    echo strtoupper("<strong>" . $key['type_price'] . "</strong>");
                    ?> </strike>
                                                                                                                        <span style='font-family:Tahoma;font-size:7pt;color:red'>(<?php echo $key["dc"] ?> %)</span></span><br>
                                                                                                                    <b><?php echo number_format($key["realprice"]) ?> </b>
                                                                                                                    <?php } else { ?>
                                                                                                                    <b><?php
                                                                                                    echo number_format($key["price_out"]);
                                                                                                    echo strtoupper("<strong>" . $key['type_price'] . "</strong>");
                                                                                                                        ?> </b>
                                                                                                            <?php } ?>
                                                                                                            </div>
                                                                                                        <?php } ?>
                                                                                                        <?php if ($key["soldout_price_string"]) { ?><?php echo $key["soldout_price_string"] ?><?php } ?>
                                                                                                        <?php if ($key["soldout_price_image"]) { ?><?php echo $key["soldout_price_image"] ?><?php } ?>
                                                                                                    <?php } else { ?><?php
                                                                                            echo "<strong>";
                                                                                            echo number_format($key["price_out"]);
                                                                                            echo "</strong>";
                                                                                            echo "  ";
                                                                                            echo strtoupper("<strong>" . $key['type_price'] . "</strong>");
                                                                                                        ?>		
                                                                                            <?php } ?>
                                                                                            </td>
    <?php
    }
}
?>

                                                                                </tr>

                                                                                <!-- end loop -->
                                                                        </td></tr>

                                                                </tbody></table>
 </body>
</html>
