<div class="col-span-12 col-span-xl-3">
          <div class="d-xl-none mb-3 text-end">
            <button class="bg--primary text--dark px-3 py-2 fw-semibold border-0 text-uppercase button--filter-toggler"><i class="fa-solid fa-filter me-2"></i><span class="me-1">Show</span>Filter</button>
          </div>

          <div class="d-none d-xl-block" id="filtersWrapper">
            <div class="filter-block">
              <h4 class="text--dark text-uppercase fw-bold">Categories</h4>

              
              <?php echo do_shortcode('[yith_wcan_filters slug="category"]');?>

              <!-- <nav class="filter-nav">
                <ul>
                  <li>
                    <a href="#">
                      <span>Gold Collection</span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <span>Platinum Collection</span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <span>Diamond Collection</span>
                      <i class="fa-solid fa-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>

            <div class="filter-block filter-block--price-range">
              <h4 class="text--dark text-uppercase fw-bold">Price Filter</h4>

              <div class="wrapper">
                <!-- <div class="slider">
                  <div class="progress"></div>
                </div>
                <div class="range-input">
                  <input type="range" class="range-min" min="0" max="10000" value="2500" step="100" />
                  <input type="range" class="range-max" min="0" max="10000" value="7500" step="100" />
                </div>
                <div class="price-input">
                  <div class="field">
                    <span>Min($)</span>
                    <input type="number" class="input-min" value="2500" />
                  </div>
                  <div class="separator">-</div>
                  <div class="field">
                    <span>Max($)</span>
                    <input type="number" class="input-max" value="7500" />
                  </div>
                </div> -->
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
              </div>
            </div>
          </div>
        </div>