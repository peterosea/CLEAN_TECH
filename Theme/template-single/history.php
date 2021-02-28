<?php

/**
 * history 포스트 상세페이지 템플릿
 * 외부링크로 이동하는 게시판이라 단일 상세페이지 필요하지 않음 그래서 302로 history 아카이브페이지로 리다이렉트
 * 
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <vanillabrain@hyeon.com>
 */

if (have_posts()) :
  wp_redirect('/history', 302);
  exit();
endif;
