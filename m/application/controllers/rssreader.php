<?php
		class rssreader extends CI_Controller
		{
				function index()
			{
								$this->load->view('rss/index');
			}

				function getrss()
			{
					$this->load->view('rss/getrss');
			}
		}
?>