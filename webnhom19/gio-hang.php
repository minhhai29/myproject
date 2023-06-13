<?php
  
  require 'DataProvider.php';
?>

<h2 class="text-center">Giỏ hàng</h2>
<div class="container"> 
  <form method="POST" action="addcard.php">
  <table id="cart" class="table table-hover table-condensed col-md-12"> 
        <?php
            $ok=1;
            if(isset($_SESSION["card"])){
              foreach($_SESSION["card"] as $k => $v)
              {
                if(isset($k))
                {
                  $ok=2;
                }
              }
            } 
            if($ok==2)
            {?>
            <thead> 
         <tr> 
        <th style="width:50%">Tên sản phẩm</th> 
        <th style="width:10%">Giá</th> 
        <th style="width:8%">Số lượng</th> 
        <th style="width:22%" class="text-center">Thành tiền</th> 
        <th style="width:10%"> </th> 
         </tr> 
        </thead> 
        <tbody>
            <?php
                foreach($_SESSION["card"] as $key => $va)
                {
                    $item[]=$key;
                }
                $str =implode("','",$item);
                $tongtien=0;
                $sql="SELECT * FROM sanpham WHERE MaSP in ('$str')";
                //$result= DataProvider::executeQuery($sql);
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result)){
                  if(isset($_SESSION["card"][$row["MaSP"]]) != 0)
                  {
            
                echo'
                <tr> 
           <td data-th="Product"> 
          <div class="row"> 
           <div class="col-sm-3 hidden-xs "><img src="'.$row['Image'].'" alt="Sản phẩm 1" class="img-responsive" width="100">
           </div> 
           <div class="col-sm-9"> 
            <h4 class="nomargin">'.$row['TenSP'].'</h4> 
            <p>Mô tả của sản phẩm 1</p> 
           </div> 
          </div> 
           </td> 
           <td data-th="Price">'.number_format($row["DonGia"],'0','.','.').'đ</td> 
           <td data-th="Quantity"><input class="form-control text-center" value="'.$_SESSION["card"][$row["MaSP"]].'" id="'.$row['MaSP'].'" name="qty['.$row["MaSP"].']"type="number">
           </td> 
           <td data-th="Subtotal" class="text-center">'.number_format($_SESSION["card"][$row["MaSP"]]*$row["DonGia"],'0','.','.').'đ</td> 
           <td class="actions" data-th="">
          <a onclick="kiemtra()" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>
          </a>
           </td> 
        </tr> ';
                $tongtien+=$_SESSION["card"][$row["MaSP"]]*$row["DonGia"];
                $_SESSION["thanhtien"]=$tongtien;
                }
                ?>
        </tbody>
                <script>
                  function kiemtra(){
                    var a=document.getElementById("<?php echo $row["MaSP"]; ?>");
                    var b = confirm("Bạn có chắc chắn muốn xóa không?")
                    if(b== true){
                      window.location="delecard.php?id=<?php echo $row["MaSP"]; ?>";
                    }
                  }
                </script>
                <?php
              }
        echo'
        <tr class="visible-xs"> 
          <td colspan="2">
            <input type="radio" name="phuongthuc" value="loai1" checked><span style="font-family:Lucidatypewriter, monospace;font-weight:600;line-height:38px;">Tiền mặt </span>
            <input type="radio" name="phuongthuc" value="loai2"><span style="font-family:Lucidatypewriter, monospace;font-weight:600;line-height:38px;">Trực tuyến</span>
            </td>
            <td  align=right style="line-height:38px;"colspan="1">Địa chỉ:</td>
            <td colspan="3"><input id="diachi" class="form form-control"type="text" size="1" name="diachi" value=""></td>
        </tr>
        </tbody>
        ';
              
            }
            else{
                echo'<div class="row" align="center"><div class="col-md-12"><h6>Không có sản phẩm nào trong giỏ hàng<h6></div></div>';
            }
            ?>
        <tr>
        <?php 
                 $okk=1;
                 if(isset($_SESSION["card"])){
                   foreach($_SESSION["card"] as $k => $v)
                   {
                     if(isset($k))
                     {
                       $okk=2;
                     }
                   }
                 }
                 if($okk==2)
                 {
                    echo'<tfoot>  
               <tr> 
              <td colspan="1" class="hidden-xs"> </td> 
              <td><input type="submit" name="submit" class="btn btn-primary" value=" Cập nhật"></td> 
              <td><input type="button" id="deletea" onclick="kiemtra1()" class="btn btn-primary" value="Hủy giỏ hàng"></td>
              </tr>';
                    ?>
                    <script>
                    function kiemtra1(){
                    var a=document.getElementById("deletea");
                    var b = confirm("Bạn có chắc chắn muốn xóa hết không?");
                    if(b== true){
                      window.location="delecard.php?delete";
                    }
                  }
                </script>

                  <?php
                    echo'
            <tr>
              <td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
              </td>
              <td colspan="2" class="hidden-xs"> </td> 
              <td class="hidden-xs text-center"><strong>Tổng tiền:'.number_format($tongtien,'0','.','.').'đ</strong>
              </td> 
              <td><button type="submit" class="btn btn-success" name="addbuy" onclick="';
              if(!isset($_SESSION['member']))
                echo'return yeucaudn()';
              else echo'return kiemtrad()';
              
              echo'"><i class="fa fa-shopping-cart"></i>Thanh toán</button>
              </td> 
               </tr> 
              </tfoot>';
                 }
                 else{
                     echo'';
                 }
        ?>
        <script>
    
  function yeucaudn()
  {
    alert("Bạn vui lòng đăng nhập để thực hiện giao dịch");
    window.location="dang-nhap.php";
    return false;
  }
  
    function ktra_rong(a){
    if(a=="") return true; 
    else return false;
  }
  
   function kiemtrad()
    {   
        var add= document.getElementById('diachi');
        if(ktra_rong(add.value)){
                    document.getElementById("diachi").placeholder="Vui lòng nhập!!!";
                    add.focus();
                    return false;        
            }
            else {
                    //var kiemtra= /(^\d?\d?\d?\d)[/][a-zA-Z ]{1,20}[/][a-zA-Z ]{1,20}[/][a-zA-Z ]{1,20}/;
                    var kiemtra = /^[!@#$%^&*()]/;
                    if(kiemtra.test(add.value)){
                        document.getElementById("diachi").value="";
                        document.getElementById("diachi").placeholder="Địa chỉ bạn nhập không hợp lệ.";
                        add.focus();
                        return false; 
                        }
                else{
                  var a=confirm("Xác nhận mua hàng!");
                    if(a== true)
                    {
            alert("Mua hàng thành công");
                       return true;
                    }
                    else{
                      return false;
                    }
                  }
                }  
    }
  </script>
        </tr>
    </table>
     </form>
  
</div>