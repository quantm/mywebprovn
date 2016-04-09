<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two restierved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home/sitemap";
$route['tu-sach'] = 'sach/tusach';
$route['tailieu-luanvan-doan/(:any)'] = 'sach/tailieu_luanvan_doan/$1';
$route['tailieu-luanvan-doangiao-an/(:any)'] = 'sach/tailieuluanvandoan/$1';
$route['tailieu-luanvan-doanm/(:any)'] = 'sach/voereduvn_m/$1';
$route['tailieu-luanvan-doanc/(:any)'] = 'sach/voereduvn_c/$1';
$route['khoa-hoc-cong-nghe/(:any)'] = 'congnghe/xem/$1';
$route['photoshop/chanel-blending-mode'] = '/photoshop/chanel_blending_mode';
$route['photoshop/blur-filter'] = '/photoshop/blur_filter';
$route['photoshop/phuc-che-anh-trang-den'] = '/photoshop/phuc_che_anh_trang_den';
$route['photoshop/hieu-chinh-anh-mau'] = '/photoshop/hieu_chinh_anh_mau';
$route['chi-tiet-sach/(:any)'] = 'book/chi_tiet_sach/$1';
$route['register-tour/(:any)'] = '/blog/register_tour/$1';
$route['bai-hat/(:any)'] = '/mobile/karaoke_view_search/$1';
$route['vol/(:any)'] = '/mobile/karaoke_view_cate/$1';
$route['tin-tuc/(:any)'] = '/news/general/$1';
$route['english-book'] = 'book/english_book';
$route['read-book'] = 'book/read_book';
$route['xem-tour/(:any)'] = '/blog/xem_tour/$1';
$route['tour/(:any)'] = '/blog/xem_tour/$1';
$route['doc-tai-lieu'] = 'book/doc_tai_lieu';
$route['luanvan'] = '/luanvan/index/';
$route['giaoan'] = '/giaoan/index/';
$route['game'] = '/game/play/';
$route['game/(:any)'] = '/game/play/$1';
$route['lap-trinh/(:any)'] = '/lap_trinh/$1';
$route['video/(:any)'] = '/video/index/$1';
$route['paging-music-online/(:any)'] = '/pagination/music/$1';
$route['book'] = '/book/category/';
$route['choi-game'] = 'play';
$route['choi-game/(:any)'] = '/entertainment/entertainment/$1';
$route['tour-du-lich-blog'] = '/blog/tour';
$route['kiem-tien-online'] = '/kiemtien/danhmuc/';
$route['nghe-nhac'] = 'music/song/';
$route['doc-sach'] = '/book/doc_sach/';
$route['kakaka/(:any)'] = '/kakaka/index/$1';
$route['giao-an/(:any)'] = '/tailieu/giao_an/$1';
$route['nau-an/(:any)'] = '/amthuc/index/$1';
$route['lam-sao/(:any)'] = '/ehow/lam_sao/$1';
$route['lam-sao'] = '/ehow/lam_sao/';
$route['ket-qua-tim-kiem-tin-tuc'] = '/news/cse/';
$route['nau-ngon'] = '/amthuc/nau_ngon';
$route['ngon-ngon'] = '/amthuc/ngon_ngon';
$route['download/chat-nhan-tin/(:any)'] = 'download/chat_nhan_tin/$1';
$route['download/diet-virus/(:any)'] = 'download/diet_virus/$1';
$route['download/mang-internet/(:any)'] = 'download/mang_internet/$1';
$route['download/bao-mat/(:any)'] = 'download/bao_mat/$1';
$route['download/xem-phim-nghe-nhac/(:any)'] = 'download/xem_phim_nghe_nhac/$1';
$route['download/ho-tro-download-upload/(:any)'] = 'download/ho_tro_download_upload/$1';
$route['download/doanh-nghiep/(:any)'] = 'download/doanh_nghiep/$1';
$route['download/van-phong/(:any)'] = 'download/van_phong/$1';
$route['download/do-hoa-thiet-ke/(:any)'] = 'download/do_hoa_thiet_ke/$1';
$route['download/giao-duc-hoc-tap/(:any)'] = 'download/giao_duc_hoc_tap/$1';
$route['download/tien-ich-he-thong/(:any)'] = 'download/tien_ich_he_thong/$1';
$route['download/chuyen-doi-audio-video/(:any)'] = 'download/chuyen_doi_audio_video/$1';
$route['download/du-lieu-file/(:any)'] = 'download/du_lieu_file/$1';
$route['download/tang-toc-may-tinh/(:any)'] = 'download/tang_toc_may_tinh/$1';
$route['download/cong-cu-ho-tro/(:any)'] = 'download/cong_cu_ho_tro/$1';
$route['download/trinh-duyet/(:any)'] = 'download/trinh_duyet/$1';
$route['download/chinh-sua-anh/(:any)'] = 'download/chinh_sua_anh/$1';
$route['tu-sach-tham-khao'] = '/book/bookcase/';
$route['kiemtien-online/(:any)'] = "/kiemtien/index/";
$route['Ajax/Company/(:any)'] = '/ajax/Company/$1';
$route['Ajax/Product/(:any)'] = '/ajax/Product/$1';
$route['xem-phim'] = '/video/view';
$route['phim3s/(:any)'] = '/video/phim3s/$1';
$route['funtoday'] = '/video/funtoday';
$route['doc-sach-tham-khao'] = '/book/doc_sach_tham_khao';
$route['blog-cuoc-song'] = '/blog/life';
$route['cuoc-song/(:any)'] = '/blog/life/$1';
$route['gia-dinh/(:any)'] = '/blog/life/$1';
$route['hon-nhan/(:any)'] = '/blog/life/$1';
$route['tam-su/(:any)'] = '/blog/life/$1';
$route['tinh-yeu/(:any)'] = '/blog/life/$1';
$route['tu-vi/(:any)'] = '/blog/life/$1';
$route['thoi-trang/(:any)'] = '/blog/life/$1';
$route['tim-gia-re/(:any)'] = '/product/tim_gia_re/$1';
$route['gia-re/(:any)'] = '/product/tim_gia_re/$1';
$route['tim-gia-re-nhat/(:any)'] = '/product/tim_gia_re_1/$1';
$route['danh-muc-gia-re/(:any)'] = '/product/danh_muc_gia_re/$1';
$route['so-sanh-gia/(:any)'] = '/product/compare/$1';
$route['mua-ban-gia-re/(:any)'] = '/product/compare/$1';
$route['so-sanh-gia'] = '/product/index/';
$route['chon-gia-dung'] = '/chongiadung/index/';
$route['chon-gia-dung/(:any)'] = '/chongiadung/index/$1';
$route['redirect/(:any)'] = '/product/redirect/$1';
$route['mua-hang-gia-re/(:any)'] = '/product/redirect/$1';
$route['redirect-inner/(:any)'] = '/product/redirect_inner/$1';
$route['go-shop-online/(:any)'] = '/product/go_shop_online/$1';
$route['paging/(:any)'] = '/product/paging/$1';
$route['sort/(:any)'] = '/product/paging/$1';
$route['click-compare-items/(:any)'] = '/product/compare_items/$1';
$route['shop-ban-san-pham/(:any)'] = '/product/compare_items/$1';
$route['lam-dep/(:any)'] = '/blog/life/$1';
$route['download-tai-lieu'] = '/book/download_tai_lieu';
$route['tai-lieu-hoc-tap/(:any)'] = '/book/tai_lieu_hoc_tap/$1';
$route['tai-lieu-hoc/(:any)'] = '/tailieu/pdf/$1';
$route['tai-lieu-pdf/(:any)'] = '/pdf/view/$1';
$route['doc-luan-van'] = '/luanvan/doc_luan_van/';
$route['tham-khao-giao-an'] = '/giaoan/doc_giao_an/';
$route['luan-van/(:any)'] = '/luanvan/doc_luan_van/$1';
$route['tai-lieu/(:any)'] = '/luanvan/doc_luan_van/$1';
$route['ebook/(:any)'] = '/luanvan/doc_luan_van/$1';
$route['bai-giang/(:any)'] = '/luanvan/doc_luan_van/$1';
$route['de-thi/(:any)'] = '/luanvan/doc_luan_van/$1';
$route['tham-khao-giao-an/(:any)'] = '/giaoan/doc_giao_an/$1';
$route['luan-van'] = '/luanvan/doc_luan_van/';
$route['tai-lieu'] = '/luanvan/doc_luan_van/';
$route['do-an'] = '/luanvan/do_an/';
$route['do-an/(:any)'] = '/luanvan/do_an/$1';
$route['rong-mo-tam-hon'] = '/book/rong_mo_tam_hon/';
$route['doc-truyen/(:any)'] = '/doctruyen/view/$1';
$route['doc-truyen'] = '/doctruyen/view/';
$route['xem-truyen-online/(:any)'] = '/story/view/$1'; //web-kit-3d
$route['xem-truyen-online'] = '/story/view/';//web-kit-3d
$route['hay-hai-hot/(:any)'] = '/story/view/$1'; //web-kit-3d
$route['hay-hai-hot'] = '/story/view/';//web-kit-3d
$route['game/([0-9\-]+)'] = "game/play/$1";
$route['book/([0-9\-]+)'] = "book/category/$1";
$route['tu-sach-tham-khao/([0-9\-]+)'] = "book/bookcase/$1";
$route['rong-mo-tam-hon/([0-9\-]+)'] = "/book/rong_mo_tam_hon/$1";
$route['giaoan/([0-9\-]+)'] = "giaoan/index/$1";
$route['kiem-tien-online/([0-9\-]+)'] = "/kiemtien/danhmuc/$1";
$route['doc-truyen-online/([0-9\-]+)'] = "/doctruyen/danhmuc/$1";
$route['tiep-thi-tieu-dung/(:any)'] = '/marketing_consumer/tttd/$1';
$route['thong-tin-cong-ty/(:any)'] = '/company/info/$1';
$route['xem-video-tong-hop/(:any)'] = '/video/htm5_video/$1';
$route['clip-moi-dep-hay-hai-hot/(:any)'] = '/video/htm5_video/$1';
$route['xem-phim-online/(:any)'] = '/video/htm5_video/$1';
$route['ma-so-karaoke/(:any)'] = '/mobile/karaoke/$1';
$route['nghe-nhac-mobile/(:any)'] = '/mobile/baihat/$1';
$route['tim-kiem-cong-ty'] = '/company/search';
$route['lazada-mua-sam'] = '/affiliate/lazada/$1';
$route['lazada-mua-sam/(:any)'] = '/affiliate/lazada/$1';
$route['lazada/(:any)'] = '/affiliate/sell_traffic_lazada_vn/$1';
$route['mua-ban-online/(:any)'] = '/affiliate/sell_traffic_lazada_vn/$1';
$route['rao-vat-online/(:any)'] = '/raovat/chotot/$1';
$route['rao-vat-mua-ban/(:any)'] = '/raovat/totdoi/$1';
$route['viet-nam-rao-vat/(:any)'] = '/raovat/raovatvn/$1';
$route['rao-vat-online'] = '/raovat/index';
$route['doc-bao-online/(:any)'] = '/news/baomoisocom/$1';
$route['xem-bao-online/(:any)'] = '/news/xembaomoicom/$1';
$route['rao-vat-tructiep/(:any)'] = '/raovat/tructiepvn/$1';
$route['phu-nu-ngay-nay/(:any)'] = '/news/phunutoday/$1';
$route['em-tui-dep/(:any)'] = '/news/emdep/$1';
$route['luanvan/([0-9\-]+)'] = "luanvan/index/$1";
$route['user-book-category/([0-9\-]+)'] = "mylibrary/add/$1";
$route['my-book/([0-9\-]+)'] = "book/mybook/$1";
$route['404_override'] = 'err404';


/* End of file routes.php */
/* Location: ./application/config/routes.php */