<div class="sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="wrapper-sidebar shop-sidebar">
                        <div class="widget woof_Widget">
                            <div class="widget widget-categories">
                                <h3 class="widgettitle">Categories</h3>
                                <ul class="list-categories">
                                    <li><?php getCategory(); ?></li>    

                                </ul>
                            </div>



                            <div class="widget widget_filter_price">
                                <h4 class="widgettitle">
                                    Price
                                </h4>
								
                                <div class="price-slider-wrapper">
                                    
                                    <div class="price-slider-amount">
									<form action="store.php?priceSort" class="form-inline" method="post" enctype="multipart/form-data">
										<input type="text" size="1" placeholder="Min" class="form-control" name="minPrice" pattern="[0-9]*">
										<input type="text" size="1" placeholder="Max" class="form-control" name="maxPrice" pattern="[0-9]*">
										<button type="submit" value="Sort" name="priceSort" onclick="window.location.href='store.php?priceSort'"><i class="fa fa-arrow-right"></i></button>
										</form>
                                    </div>
                                </div>
								
                            </div>
                            <div class="widget widget-brand">
                                <h3 class="widgettitle">Brand</h3>
                                <ul class="list-brand">
                                    <li>
                                        <?php 
                                        getManufactures();
                                        ?>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="widget newsletter-widget">
                            <div class="newsletter-form-wrap ">
                                <h3 class="title">Subscribe to Our Newsletter</h3>
                                <div class="subtitle">
                                    More special Deals, Events & Promotions
                                </div>
                                <input type="email" class="email" placeholder="Your email letter">
                                <button type="submit" class="button submit-newsletter">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>