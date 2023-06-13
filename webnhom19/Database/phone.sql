-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th5 15, 2022 lúc 04:57 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phone`
--

-- --------------------------------------------------------

--
-- Tạo bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` varchar(10) NOT NULL,
  `MaHoaDon` varchar(10) NOT NULL,
  `MaSp` varchar(30) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` varchar(30) NOT NULL,
  `DonViTinh` varchar(10) NOT NULL,
  `ThanhTien` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tạo dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaHoaDon`, `MaSp`, `SoLuong`, `DonGia`, `DonViTinh`, `ThanhTien`) VALUES
('CT1', 'HD3', 'so13', 3, '13900000', 'VND', '41700000'),
('CT10', 'HD7', 'so18', 1, '13900000', 'VND', '13900000'),
('CT11', 'HD8', 'so13', 1, '13900000', 'VND', '13900000'),
('CT12', 'HD9', 'ip19', 2, '17900000', 'VND', '35800000'),
('CT13', 'HD9', 'no2', 1, '17900000', 'VND', '17900000'),
('CT14', 'HD9', 'no24', 2, '17900000', 'VND', '35800000'),
('CT15', 'HD9', 'op1', 1, '17900000', 'VND', '17900000'),
('CT16', 'HD9', 'so14', 4, '13900000', 'VND', '55600000'),
('CT17', 'HD10', 'ip19', 1, '17900000', 'VND', '17900000'),
('CT18', 'HD11', 'ip4', 2, '17900000', 'VND', '35800000'),
('CT19', 'HD11', 'op1', 1, '17900000', 'VND', '17900000'),
('CT2', 'HD3', 'so18', 1, '13900000', 'VND', '13900000'),
('CT20', 'HD12', 'ip13', 1, '13900000', 'VND', '13900000'),
('CT21', 'HD12', 'no2', 1, '17900000', 'VND', '17900000'),
('CT22', 'HD13', 'ss7', 10, '13900000', 'VND', '139000000'),
('CT23', 'HD14', 'ip4', 1, '17900000', 'VND', '17900000'),
('CT24', 'HD15', 'ip4', 2, '17900000', 'VND', '35800000'),
('CT25', 'HD15', 'ss4', 1, '17900000', 'VND', '17900000'),
('CT26', 'HD1', 'ip11', 3, '25600000', 'VND', '76800000'),
('CT27', 'HD1', 'ip13', 3, '27780000', 'VND', '83340000'),
('CT28', 'HD2', 'ip14', 3, '19900000', 'VND', '59700000'),
('CT29', 'HD2', 'ip21', 3, '11900000', 'VND', '35700000'),
('CT3', 'HD4', 'op20', 1, '13900000', 'VND', '13900000'),
('CT30', 'HD3', 'so10', 2, '7900000', 'VND', '15800000'),
('CT31', 'HD3', 'so20', 3, '6200000', 'VND', '18600000'),
('CT32', 'HD3', 'so8', 3, '13900000', 'VND', '41700000'),
('CT4', 'HD4', 'so13', 3, '13900000', 'VND', '41700000'),
('CT5', 'HD4', 'so14', 2, '13900000', 'VND', '27800000'),
('CT6', 'HD5', 'so13', 1, '13900000', 'VND', '13900000'),
('CT7', 'HD5', 'so16', 1, '13900000', 'VND', '13900000'),
('CT8', 'HD5', 'so18', 2, '13900000', 'VND', '27800000'),
('CT9', 'HD6', 'so14', 1, '13900000', 'VND', '13900000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MaSp` varchar(30) NOT NULL,
  `MaKhuyenMai` varchar(30) NOT NULL,
  `TiLeKhuyenMai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` varchar(10) NOT NULL,
  `MaHoaDon` varchar(10) NOT NULL,
  `TenKhachHang` varchar(30) NOT NULL,
  `SDTNguoiNhan` varchar(30) NOT NULL,
  `DiaChiGiaoHang` varchar(30) NOT NULL,
  `TenNguoiGiaoHang` varchar(30) NOT NULL,
  `TinhTrangDonHang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaHoaDon`, `TenKhachHang`, `SDTNguoiNhan`, `DiaChiGiaoHang`, `TenNguoiGiaoHang`, `TinhTrangDonHang`) VALUES
('DH1', 'HD1', 'abc', '0856305720', '21/sdas/dasd/gfg', 'Nguyễn Văn A', 'chuagiao'),
('DH8', 'HD10', 'abcxyz125', '0846524578', '11/nguyen thi tu/ binh tan/tph', 'Nguyễn Văn A', 'chuagiao'),
('DH9', 'HD11', 'abcxyz125', '0846524578', '11/nguyen thi tu/ binh tan/tph', 'Nguyễn Văn A', 'chuagiao'),
('DH10', 'HD12', 'beyeu123abc', '', '30/dsad/dasd/dasd', 'Nguyễn Văn A', 'chuagiao'),
('DH11', 'HD13', 'beyeu123abc', '', '75/ygbhj/gfcf/trgdf', 'Nguyễn Văn A', 'bihuy'),
('DH12', 'HD14', '1234567890', '0374659500', '273 An Dương Vương Phường 3 Qu', 'Nguyễn Văn A', 'chuagiao'),
('DH13', 'HD15', '1234567890', '0374659500', '79/20/1H, phường19, quận Bình ', 'Nguyễn Văn A', 'chuagiao'),
('DH14', 'HD2', 'beyeu1234', '0123456789', '91 Cư xá Tự Do', 'Nguyễn Văn A', 'chuagiao'),
('DH15', 'HD3', 'nguyenthanhtinh1995', '0456823971', '79/20/1H, phường19, quận Bình ', 'Nguyễn Văn A', 'chuagiao'),
('DH3', 'HD4', 'abcxyz125', '0846524578', '11/nguyen thi tu/ binh tan/tph', 'Nguyễn Văn A', 'dagiao'),
('DH6', 'HD5', 'abcxyz125', '0846524578', '11/nguyen thi tu/ binh tan/tph', 'Nguyễn Văn A', 'bihuy'),
('DH4', 'HD6', 'abcxyz125', '0846524578', '11/nguyen thi tu/ binh tan/tph', 'Nguyễn Văn A', 'chuagiao'),
('DH5', 'HD7', 'abcxyz125', '0846524578', '11/nguyen thi tu/ binh tan/tph', 'Nguyễn Văn A', 'chuagiao'),
('DH6', 'HD8', 'abcxyz125', '0846524578', '119/da nam/binh/tphcm', 'Nguyễn Văn A', 'chuagiao'),
('DH7', 'HD9', 'abcxyz125', '0846524578', '30/dsad/dasd/dasd', 'Nguyễn Văn A', 'chuagiao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` varchar(10) NOT NULL,
  `NgayDatHang` date NOT NULL,
  `PhuongThucThanhToan` varchar(10) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `TongTien` varchar(30) NOT NULL,
  `PhiVanChuyen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `NgayDatHang`, `PhuongThucThanhToan`, `UserName`, `TongTien`, `PhiVanChuyen`) VALUES
('HD1', '2019-05-15', 'loai1', '1234567890', '160140000', '0'),
('HD2', '2019-05-15', 'loai1', 'beyeu1234', '95400000', '0'),
('HD3', '2019-05-15', 'loai1', 'nguyenthanhtinh1995', '76100000', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKhuyenMai` varchar(10) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `MaLoaiSP` varchar(30) NOT NULL,
  `TenLoaiSP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`MaLoaiSP`, `TenLoaiSP`) VALUES
('ip', 'iphone'),
('no', 'nokia'),
('op', 'oppo'),
('so', 'sony'),
('ss', 'samsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `MaKhachHang` varchar(10) NOT NULL,
  `TenKhachHang` varchar(30) NOT NULL,
  `Quyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaLoaiSP` varchar(20) NOT NULL,
  `MaSP` varchar(20) NOT NULL,
  `TenSP` varchar(20) NOT NULL,
  `SLTon` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `Image` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaLoaiSP`, `MaSP`, `TenSP`, `SLTon`, `DonGia`, `Image`) VALUES
('ip', 'ip1', 'iPhone X 32GB', 50, 21500000, 'Images/iphone/iphone1.png'),
('ip', 'ip10', 'iPhone XS Max 256GB', 50, 13900000, 'images/iphone/iphone10.png'),
('ip', 'ip11', 'iPhone XR 128GB', 47, 25600000, 'images/iphone/iphone11.png'),
('ip', 'ip12', 'iPhone 6 64GB', 50, 7790000, 'images/iphone/iphone12.png'),
('ip', 'ip13', 'iPhone XR 256GB', 46, 27780000, 'images/iphone/iphone13.png'),
('ip', 'ip14', 'iPhone X 128GB', 47, 19900000, 'images/iphone/iphone14.png'),
('ip', 'ip15', 'iPhone X 256GB', 50, 23400000, 'images/iphone/iphone15.png'),
('ip', 'ip16', 'iPhone XR 64GB', 50, 18500000, 'images/iphone/iphone16.png'),
('ip', 'ip17', 'iPhone 8 Plus 256GB', 50, 11000000, 'images/iphone/iphone17.png'),
('ip', 'ip18', 'iPhone 7 64GB', 50, 1090000, 'images/iphone/iphone18.png'),
('ip', 'ip19', 'iPhone XS Max 512GB', 50, 29900000, 'images/iphone/iphone19.png'),
('ip', 'ip2', 'iPhone 7 32GB', 50, 8900000, 'images/iphone/iphone2.png'),
('ip', 'ip20', 'iPhone 7 128GB', 50, 9900000, 'images/iphone/iphone20.png'),
('ip', 'ip21', 'iPhone 8 128GB', 47, 11900000, 'images/iphone/iphone21.png'),
('ip', 'ip22', 'iPhone XS 256GB', 50, 13900000, 'images/iphone/iphone22.png'),
('ip', 'ip23', 'iPhone XS 128GB', 50, 14900000, 'images/iphone/iphone23.png'),
('ip', 'ip24', 'iPhone 5 32GB', 50, 3900000, 'images/iphone/iphone24.png'),
('ip', 'ip3', 'iPhone XS 64GB', 50, 12900000, 'images/iphone/iphone3.png'),
('ip', 'ip4', 'iPhone XS Max 128GB', 47, 18900000, 'images/iphone/iphone4.png'),
('ip', 'ip5', 'iPhone 7 Plus', 50, 6900000, 'images/iphone/iphone5.png'),
('ip', 'ip6', 'iPhone 8 32GB', 50, 8900000, 'images/iphone/iphone6.png'),
('ip', 'ip7', 'iPhone XS Max 64GB', 50, 12900000, 'images/iphone/iphone7.png'),
('ip', 'ip8', 'iPhone 8 Plus', 50, 9900000, 'images/iphone/iphone8.png'),
('ip', 'ip9', 'iPhone X 64GB', 50, 10900000, 'images/iphone/iphone9.png'),
('no', 'no1', 'Nokia 8.1', 50, 5900000, 'images/nokia/nokia1.png'),
('no', 'no10', 'Nokia 2.1 Plus', 50, 1800000, 'images/nokia/nokia10.png'),
('no', 'no11', 'Nokia 8110', 50, 1390000, 'images/nokia/nokia11.png'),
('no', 'no12', 'Nokia 3', 50, 3900000, 'images/nokia/nokia12.png'),
('no', 'no13', 'Nokia 1080+', 50, 2900000, 'images/nokia/nokia13.png'),
('no', 'no14', 'Nokia 1080', 50, 200000, 'images/nokia/nokia14.png'),
('no', 'no15', 'Nokia 230', 50, 280000, 'images/nokia/nokia15.png'),
('no', 'no16', 'Nokia 3310', 50, 900000, 'images/nokia/nokia16.png'),
('no', 'no17', 'Nokia 210', 50, 600000, 'images/nokia/nokia17.png'),
('no', 'no18', 'Nokia 150', 50, 150000, 'images/nokia/nokia18.png'),
('no', 'no19', 'Nokia 130', 50, 700000, 'images/nokia/nokia19.png'),
('no', 'no2', 'Nokia 6.1 Plus', 49, 300000, 'images/nokia/nokia2.png'),
('no', 'no20', 'iPhone 106', 50, 450000, 'images/nokia/nokia20.png'),
('no', 'no21', 'Nokia 105', 50, 250000, 'images/nokia/nokia21.png'),
('no', 'no22', 'Nokia 3310+', 50, 1300000, 'images/nokia/nokia22.png'),
('no', 'no23', 'Nokia 1150', 50, 1100000, 'images/nokia/nokia23.png'),
('no', 'no24', 'Nokia 6.1 128GB', 50, 900000, 'images/nokia/nokia24.png'),
('no', 'no3', 'Nokia 5.1', 50, 390000, 'images/nokia/nokia3.png'),
('no', 'no4', 'Nokia 3.1', 50, 129000, 'images/nokia/nokia4.png'),
('no', 'no5', 'Nokia 5.1 Plus', 50, 106000, 'images/nokia/nokia5.png'),
('no', 'no6', '3.1 Plus', 50, 1450000, 'images/nokia/nokia6.png'),
('no', 'no7', 'Nokia 6.1', 50, 139000, 'images/nokia/nokia7.png'),
('no', 'no8', 'Nokia 8.1', 50, 910000, 'images/nokia/nokia8.png'),
('no', 'no9', 'Nokia 2.1', 50, 700000, 'images/nokia/nokia9.png'),
('op', 'op1', 'Oppo Find X', 50, 21900000, 'images/oppo/oppo1.png'),
('op', 'op10', 'Oppo F3', 50, 8900000, 'images/oppo/oppo10.png'),
('op', 'op11', 'Oppo A71+', 50, 10900000, 'images/oppo/oppo11.png'),
('op', 'op12', 'Oppo A71', 50, 10000000, 'images/oppo/oppo12.png'),
('op', 'op13', 'Oppo A83', 50, 12900000, 'images/oppo/oppo13.png'),
('op', 'op14', 'Oppo A37', 50, 11900000, 'images/oppo/oppo14.png'),
('op', 'op15', 'Oppo F11', 50, 12900000, 'images/oppo/oppo15.png'),
('op', 'op16', 'Oppo F11s', 50, 14900000, 'images/oppo/oppo16.png'),
('op', 'op17', 'Oppo A3s', 50, 7900000, 'images/oppo/oppo17.png'),
('op', 'op18', 'Oppo F7 Youth', 50, 6900000, 'images/oppo/oppo18.png'),
('op', 'op19', 'Oppo F7', 50, 8900000, 'images/oppo/oppo19.png'),
('op', 'op2', 'Oppo A3', 50, 9900000, 'images/oppo/oppo2.png'),
('op', 'op20', 'Oppo F3s', 50, 8900000, 'images/oppo/oppo20.png'),
('op', 'op21', 'Oppo F7s', 50, 7900000, 'images/oppo/oppo21.png'),
('op', 'op22', 'Oppo F9s', 50, 13900000, 'images/oppo/oppo22.png'),
('op', 'op23', 'Oppo A37w', 50, 3100000, 'images/oppo/oppo23.png'),
('op', 'op24', 'Oppo A83s', 50, 13900000, 'images/oppo/oppo24.png'),
('op', 'op3', 'Oppo A7', 50, 9900000, 'images/oppo/oppo3.png'),
('op', 'op4', 'Oppo A3+', 50, 8900000, 'images/oppo/oppo4.png'),
('op', 'op5', 'Oppo R17', 50, 12900000, 'images/oppo/oppo5.png'),
('op', 'op6', 'Oppo F9', 50, 13800000, 'images/oppo/oppo6.png'),
('op', 'op7', 'Oppo F15', 50, 2900000, 'images/oppo/oppo7.png'),
('op', 'op8', 'Oppo F7', 50, 14000000, 'images/oppo/oppo8.png'),
('op', 'op9', 'Oppo F1s', 50, 16900000, 'images/oppo/oppo9.png'),
('so', 'so1', 'Sony Xperia 10', 50, 5900000, 'images/sony/sony1.png'),
('so', 'so10', 'Sony Xperia XZ1', 48, 7900000, 'images/sony/sony10.png'),
('so', 'so11', 'Sony Xperia XA1', 50, 9900000, 'images/sony/sony11.png'),
('so', 'so12', 'Sony Xperia Z2a', 50, 7800000, 'images/sony/sony12.png'),
('so', 'so13', 'Sony Xperia Z', 51, 3900000, 'images/sony/sony13.png'),
('so', 'so14', 'Sony Xperia Z C6602', 50, 4600000, 'images/sony/sony14.png'),
('so', 'so15', 'Sony Xperia Ericsson', 50, 5800000, 'images/sony/sony15.png'),
('so', 'so16', 'Sony Ericsson K508', 51, 5900000, 'images/sony/sony16.png'),
('so', 'so17', 'Sony Ericsson Z505', 50, 1900000, 'images/sony/sony17.png'),
('so', 'so18', 'Sony Ericsson K510i', 52, 2900000, 'images/sony/sony18.png'),
('so', 'so19', 'Sony Ericsson W88i', 50, 13900000, 'images/sony/sony19.png'),
('so', 'so2', 'Sony Xperia 4', 50, 5600000, 'images/sony/sony2.png'),
('so', 'so20', 'Sony Ericsson D750i', 47, 6200000, 'images/sony/sony20.png'),
('so', 'so21', 'Sony Ericsson W830i', 50, 13900000, 'images/sony/sony21.png'),
('so', 'so22', 'Sony Ericsson T303', 50, 4900000, 'images/sony/sony22.png'),
('so', 'so23', 'Sony Ericsson T230', 50, 2700000, 'images/sony/sony23.png'),
('so', 'so24', 'Sony Xperia Z600', 50, 2600000, 'images/sony/sony24.png'),
('so', 'so3', 'Sony Xperia 1', 50, 4900000, 'images/sony/sony3.png'),
('so', 'so4', 'Sony Xperia 10 Plus', 50, 3800000, 'images/sony/sony4.png'),
('so', 'so5', 'Sony Xperia L3', 50, 1800000, 'images/sony/sony5.png'),
('so', 'so6', 'Sony Xperia 2', 50, 4400000, 'images/sony/sony6.png'),
('so', 'so7', 'Sony Xperia 1', 50, 2780000, 'images/sony/sony7.png'),
('so', 'so8', 'Sony Xperia 10 Ultra', 47, 13900000, 'images/sony/sony8.png'),
('so', 'so9', 'Sony Xperia X72', 50, 13900000, 'images/sony/sony9.png'),
('ss', 'ss1', 'Samsung Galaxy A7 (2', 50, 13900000, 'images/samsung/samsung1.png'),
('ss', 'ss10', 'Samsung Galaxy Note ', 50, 13900000, 'images/samsung/samsung10.png'),
('ss', 'ss11', 'Samsung Galaxy A9', 50, 13900000, 'images/samsung/samsung11.png'),
('ss', 'ss12', 'Samsung Galaxy A10', 50, 13900000, 'images/samsung/samsung12.png'),
('ss', 'ss13', 'Samsung Galaxy A20', 50, 13900000, 'images/samsung/samsung13.png'),
('ss', 'ss14', 'Samsung Galaxy A50', 50, 13900000, 'images/samsung/samsung14.png'),
('ss', 'ss15', 'Samsung Galaxy A8 St', 50, 13900000, 'images/samsung/samsung15.png'),
('ss', 'ss16', 'Samsung Galaxy A30', 50, 13900000, 'images/samsung/samsung16.png'),
('ss', 'ss17', 'Samsung Galaxy M20', 50, 13900000, 'images/samsung/samsung17.png'),
('ss', 'ss18', 'Samsung Galaxy S10', 50, 13900000, 'images/samsung/samsung18.png'),
('ss', 'ss19', 'Samsung Galaxy S10+', 50, 13900000, 'images/samsung/samsung19.png'),
('ss', 'ss2', 'Samsung Galaxy J4+', 50, 13900000, 'images/samsung/samsung2.png'),
('ss', 'ss20', 'Samsung Galaxy J4 Co', 50, 13900000, 'images/samsung/samsung20.png'),
('ss', 'ss21', 'Samsung Galaxy J2', 50, 13900000, 'images/samsung/samsung21.png'),
('ss', 'ss22', 'Samsung Galaxy J2 Co', 50, 13900000, 'images/samsung/samsung22.png'),
('ss', 'ss23', 'Samsung Galaxy S10e', 50, 13900000, 'images/samsung/samsung23.png'),
('ss', 'ss24', 'Samsung Galaxy A80', 50, 13900000, 'images/samsung/samsung24.png'),
('ss', 'ss3', 'Samsung Galaxy S9+ 6', 50, 17900000, 'images/samsung/samsung3.png'),
('ss', 'ss4', 'Samsung Galaxy Note ', 49, 17900000, 'images/samsung/samsung4.png'),
('ss', 'ss5', 'Samsung Galaxy Note ', 50, 13900000, 'images/samsung/samsung5.png'),
('ss', 'ss6', 'Samsung Galaxy J4+ (', 50, 13900000, 'images/samsung/samsung6.png'),
('ss', 'ss7', 'Samsung Galaxy J6', 50, 13900000, 'images/samsung/samsung7.png'),
('ss', 'ss8', 'Samsung Galaxy Note ', 50, 13900000, 'images/samsung/samsung8.png'),
('ss', 'ss9', 'Samsung Galaxy Note ', 50, 13900000, 'images/samsung/samsung9.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `MaKhachHang` varchar(100) NOT NULL,
  `UserName` varchar(300) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DiaChi` varchar(300) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `Quyen` varchar(100) DEFAULT NULL,
  `TrangThai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`MaKhachHang`, `UserName`, `Password`, `DiaChi`, `Email`, `SDT`, `Quyen`, `TrangThai`) VALUES
('KH01', 'admin2001', '19052001', N'81 An Dương Vương', 'phambanguyentrung2015@gmail.com', '0374659500', 'admin', '1'),
('KH02', 'master', '19112001', N'71 Nguyễn Xí', 'phambanguyentrung2015@gmail.com', '0374659500', 'master', '1'),
('KH11', 'manager', '19052001', N'173 An Dương Vương', 'trantrungthien2001@gmail.com', '', 'manager', '1'),
('KH03', '1234567890', '1234567890', N'173 An Dương Vương', 'phambanguyentrung2015@gmail.com', '0374659500', 'customer', '1'),
('KH10', 'motconvitxoehaicaicanh123', 'convitcon123', N'79 Thạch Thị Thanh', 'phambanguyentrung2015@gmail.com', '', 'customer', '0'),
('KH12', 'nguyendactoan2001', '19112001', N'79/20/1H, phường19, quận Bình Thạnh', '123456789@gmail.com', '1234567891', 'customer', ''),
('KH13', 'beyeu1234', '123456789', N'91 Cư xá Tự Do', 'beyeu@gmail.com', '0123456789', 'customer', '1'),
('KH14', 'nguyenthanhtinh1995', 'nguyenthanhtinh1995', N'78 Bà Triệu', 'phambanguyentrung2015@gmail.com', '0456823971', 'customer', '1'),
('KH4', 'vienthonga123abc', 'trieuchuhiha1999', N'79/20/1H, phường19, quận Bình Thạnh', 'phambanguyentrung2015@gmail.com', '', 'customer', '1'),
('KH5', 'banhbeo123456', '123456789', N'79/20/1H, phường19, quận Bình Thạnh', 'anhcoll1999@gmail.com', '', 'customer', '1'),
('KH6', 'motcaibenho123', '1234567890', N'79/20/1H, phường19, quận Bình Thạnh', 'phambanguyentrung2015@gmail.com', '', 'customer', '1'),
('KH7', 'beyeu123abc', '123456789', N'79/20/1H, phường19, quận Bình Thạnh', 'phambanguyentrung2015@gmail.com', '0138465950', 'customer', '1'),
('KH8', 'abcxyz123', '123123', N'119/da nam/binh/tphcm', 'abc@gmail.com', '', 'customer', ''),
('KH9', 'abcxyz125', '123123', N'30/dsad/dasd/dasd', 'abc@gmail.com', '0846524578', 'customer', '1');

--
-- Chỉ mục cho các bảng đã đổ
--


--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `MaChiTietHoaDon` (`MaChiTietHoaDon`),
  ADD KEY `MaSp` (`MaSp`);

--
-- Chỉ mục cho bảng `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`),
  ADD UNIQUE KEY `MaKhuyenMai` (`MaKhuyenMai`),
  ADD KEY `MaSp` (`MaSp`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD UNIQUE KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `TenNguoiGiaoHang` (`TinhTrangDonHang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoaiSP` (`MaLoaiSP`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`MaKhachHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
