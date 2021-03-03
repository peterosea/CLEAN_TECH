<?php

/**
 * equipment의 특정 포스트 상세페이지를 리다이렉트
 * 외부링크로 이동하는 게시판이라 단일 상세페이지 필요하지 않음 그래서 302로 equipment의 특정 페이지로 리다이렉트
 * 
 * Template Name: AMR 비교장비 섹션 리다이렉트
 * Template Post Type: equipment
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <vanillabrain@hyeon.com>
 */

wp_redirect('/amr#schedule', 302);
exit();
