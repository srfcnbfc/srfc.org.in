<!DOCTYPE HTML>
<html lang="en-US">
    <?php include 'app/config/front-config.php'; 
    $site_title = "Disclosure | Shri Ram Finance Corporation Pvt. Ltd.";
     $site_description = "Shri Ram Finance Corporation Private Limited is one of Central India's fastest growing NBFCs. Founded by Shri Ganesh Bhattar and leading by Shri Gaurav Bhattar. SRFC was incorporated in April 2004 and was involved in Two wheeler finance."; ?>
    <?php
    $vacancy_sql = "SELECT vacancy_id , job_title, job_title_slug,job_designation, job_timing FROM vacancy ORDER by vacancy_id DESC LIMIT 10";
    $vacancy_row = getData($vacancy_sql);
    ?>
    <?php include 'header.php'; ?>
    <style>
      :root {
        --primary-color: #006eae;
        --secondary-color: #007cc4;
        --accent-color: #00a859;
        --light-bg: #f8f9fa;
        --border-color: #e2e8f0;
        --card-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
      }

      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f7fb;
        color: #333;
        line-height: 1.5;
      }
      
      /* --- REMOVE UNDERLINE FROM ALL LINKS --- */
      a, a:hover, a:focus, a:active {
          text-decoration: none !important;
          outline: none !important;
      }

      .banking-container {
        margin: 0 auto;
        overflow: hidden;
        width: 100%;
      }

      .banking-header {
        background: linear-gradient(
          135deg,
          var(--primary-color) 0%,
          var(--secondary-color) 100%
        );
        color: white;
        padding: 24px 30px;
        border-bottom: 4px solid var(--accent-color);
      }

      .banking-header h1 {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 6px 0;
        color: #ffffff;
      }

      .banking-header .subtitle {
        font-size: 15px;
        opacity: 0.95;
        margin-bottom: 0;
        color: #e0f2fe;
      }

      .tab-content-banking {
        max-width: 1200px;
        padding: 30px 20px;
        margin: 0 auto;
      }

      .section-title {
        color: var(--primary-color);
        font-size: 24px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 2px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
      }

      /* Search / Filter Bar */
      .disclosure-search-wrap {
        position: relative;
        margin-bottom: 24px;
      }

      .disclosure-search-box {
        position: relative;
        display: flex;
        align-items: center;
      }

      .disclosure-search-box i.search-icon {
        position: absolute;
        left: 18px;
        color: #94a3b8;
        font-size: 16px;
        pointer-events: none;
      }

      .disclosure-search-input {
        width: 100%;
        height: 50px;
        padding: 10px 48px 10px 48px;
        border-radius: 50px;
        border: 2px solid #e2e8f0;
        background: #ffffff;
        font-size: 15px;
        color: #1e293b;
        transition: all 0.25s ease;
        outline: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      }

      .disclosure-search-input:focus {
        border-color: #0284c7;
        box-shadow: 0 0 0 4px rgba(2, 132, 199, 0.12);
      }

      .clear-search-btn {
        position: absolute;
        right: 16px;
        background: #e2e8f0;
        border: none;
        width: 26px;
        height: 26px;
        border-radius: 50%;
        color: #64748b;
        font-size: 16px;
        line-height: 1;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
      }

      .clear-search-btn:hover {
        background: #cbd5e1;
        color: #0f172a;
      }

      .search-counter-badge {
        font-size: 13px;
        color: #64748b;
        margin-top: 8px;
        padding-left: 16px;
        font-weight: 500;
      }

      /* Financial Card Accordions */
      .financial-card {
        background: #ffffff;
        border-radius: 12px;
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: box-shadow 0.25s ease, border-color 0.25s ease;
        margin-bottom: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
      }

      .financial-card:hover {
        border-color: #cbd5e1;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      }

      .card-header-banking {
        background-color: #ffffff;
        padding: 16px 22px;
        border-bottom: 1px solid transparent;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.2s ease, border-color 0.2s ease;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
      }

      .card-header-banking:hover,
      .card-header-banking:focus {
        background-color: #f8fafc;
      }

      .card-header-banking h4 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
        flex: 1;
      }

      .card-header-banking h4 i {
        font-size: 18px;
        flex-shrink: 0;
      }

      .header-right-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
      }

      .doc-count-pill {
        display: inline-block;
        font-size: 11.5px;
        font-weight: 600;
        background: #f1f5f9;
        color: #475569;
        padding: 3px 10px;
        border-radius: 50px;
        border: 1px solid #e2e8f0;
      }

      .toggle-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #f1f5f9;
        color: #0284c7;
        font-size: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.25s ease, color 0.25s ease, box-shadow 0.25s ease;
        flex-shrink: 0;
      }

      .card-header-banking:hover .toggle-icon {
        background: #e0f2fe;
        color: #0284c7;
      }

      .card-header-banking[aria-expanded="true"] {
        border-bottom-color: #f1f5f9;
        background-color: #f8fafc;
      }

      .card-header-banking[aria-expanded="true"] .toggle-icon {
        transform: rotate(180deg);
        background: #0284c7;
        color: #ffffff;
        box-shadow: 0 2px 8px rgba(2, 132, 199, 0.25);
      }

      /* Silky Smooth Collapsible Panel via CSS Grid */
      .financial-collapse {
        display: grid;
        grid-template-rows: 0fr;
        transition: grid-template-rows 0.35s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease, visibility 0.35s;
        opacity: 0;
        visibility: hidden;
      }

      .financial-collapse.is-open {
        grid-template-rows: 1fr;
        opacity: 1;
        visibility: visible;
      }

      .financial-collapse > .card-body-banking {
        overflow: hidden;
        min-height: 0;
        padding: 0 20px;
        transition: padding 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        background: #fafbfe;
      }

      .financial-collapse.is-open > .card-body-banking {
        padding: 16px 20px;
      }

      .report-list-container {
        max-height: 420px;
        overflow-y: auto;
        padding: 4px;
        -webkit-overflow-scrolling: touch;
      }

      /* Report Item Touch Target */
      .report-item {
        padding: 14px 18px;
        background: #ffffff;
        border: 1px solid #eef2f6;
        border-radius: 10px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 14px;
        transition: all 0.2s ease;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
      }

      .report-item:last-child {
        margin-bottom: 0;
      }

      .report-item:hover,
      .report-item:active {
        background-color: #f0f7ff;
        border-color: #bae6fd;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(2, 132, 199, 0.08);
      }

      .report-title {
        font-weight: 600;
        color: #1e293b;
        font-size: 14.5px;
        line-height: 1.4;
        word-break: break-word;
        flex: 1;
      }

      .report-item:hover .report-title {
        color: #0284c7;
      }

      /* PDF Action Button on Right */
      .report-item a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #fee2e2;
        color: #dc2626 !important;
        border: 1px solid #fca5a5;
        padding: 8px 15px;
        border-radius: 50px;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
        flex-shrink: 0;
        transition: all 0.2s ease;
        text-decoration: none !important;
      }

      .report-item:hover a,
      .report-item a:hover {
        background: #dc2626;
        color: #ffffff !important;
        border-color: #dc2626;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
      }

      .pdf-icon {
        color: inherit !important;
        font-size: 15px;
      }

      .footer-info {
        background-color: #f8fafd;
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
        font-size: 14px;
        color: #555;
        border-left: 4px solid var(--accent-color);
      }

      /* RESPONSIVE MEDIA QUERIES FOR MOBILE */
      @media (max-width: 768px) {
        .breadcumb-area {
            min-height: auto !important;
            height: auto !important;
            padding: 30px 15px !important;
        }

        .banking-header {
            padding: 18px 16px;
        }

        .banking-header h1 {
            font-size: 22px;
        }
        
        .banking-header .subtitle {
            font-size: 13.5px;
        }

        .tab-content-banking {
            padding: 16px 12px;
        }

        .section-title {
            font-size: 20px;
            margin-bottom: 16px;
        }

        .disclosure-search-input {
            height: 46px;
            font-size: 14px;
        }
        
        .card-header-banking {
            padding: 14px 16px;
        }
        
        .card-header-banking h4 {
            font-size: 15px;
            gap: 8px;
        }

        .doc-count-pill {
            display: none;
        }
        
        .card-body-banking {
            padding: 12px 10px;
        }

        /* Eliminate mobile scroll-trap so whole page scrolls naturally */
        .report-list-container {
            max-height: none !important;
            overflow-y: visible !important;
        }
        
        .report-item {
            padding: 12px 14px;
            gap: 10px;
        }

        .report-title {
            font-size: 13.5px;
        }

        .report-item a {
            padding: 6px 12px;
            font-size: 12px;
        }
      }
    </style>
    <!--------------------------------------------------->
    <!--Start Header Slider Section -->
    <!--===================================================-->
    <div class="breadcumb-area d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="breadcumb-content">
                        <h1>Financial Performance & Annual Report</h1>
                        <ul>
                            <li><a href="/">Home</a></li>
                            <li> Financial Performance & Annual Report</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banking-container">
      <!-- Banking Style Header -->
      <div class="banking-header">
        <h1>Investor Corner</h1>
        <p class="subtitle">
          Financial Performance & Annual Report
        </p>
      </div>

      <!-- Tab Content -->
      <div class="tab-content tab-content-banking">
        <!-- Disclosure Main Tab -->
        <div role="tabpanel" class="tab-pane active" id="disclosure-main">
          <h2 class="section-title">
            <span>Financial Performance & Annual Report</span>
          </h2>

          <!-- Instant Search & Filter Bar -->
          <div class="disclosure-search-wrap">
            <div class="disclosure-search-box">
              <i class="fa fa-search search-icon"></i>
              <input type="text" id="disclosureSearch" class="disclosure-search-input" placeholder="Search reports by year or keyword (e.g. 2025, Annual Report, Financials)..." autocomplete="off">
              <button type="button" id="clearSearchBtn" class="clear-search-btn" title="Clear search">&times;</button>
            </div>
            <div id="searchCounterBadge" class="search-counter-badge" style="display: none;"></div>
          </div>

          <!-- 1. Annual Return -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-target="#annualReturn"
              aria-expanded="true"
              role="button"
              tabindex="0"
            >
              <h4>
                <i
                  class="fa fa-file-text"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Annual Report
              </h4>
              <span class="toggle-icon"><i class="fa fa-chevron-down"></i></span>
            </div>
            <div id="annualReturn" class="financial-collapse is-open">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                    
                  <div class="report-item">
                    <span class="report-title">Annual_Report_2021-22</span>
                    <a href="upload/fpar/annual_report/annual_report_2021-22.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual_Report_2022-23</span>
                    <a href="upload/fpar/annual_report/annual_report_2022-23.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual_Report_2023-24</span>
                    <a href="upload/fpar/annual_report/annual_report_2023-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual_Report_2024-25</span>
                    <a href="upload/fpar/annual_report/annual_report_2024-25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Annual_Report_2025-26</span>
                    <a href="upload/fpar/annual_report/Annual Report_2025-26.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                   
                </div>
              </div>
            </div>
          </div>

          <!-- 2. Corporate Governance -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-target="#corporateGovernance"
              aria-expanded="false"
              role="button"
              tabindex="0"
            >
              <h4>
                <i
                  class="fa fa-sitemap"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Board Meeting Intimation
              </h4>
              <span class="toggle-icon"><i class="fa fa-chevron-down"></i></span>
            </div>
            <div id="corporateGovernance" class="financial-collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">Prior intimation_Board meeting to be held on 10.11.2025</span>
                    <a href="upload/fpar/board_meeting_intimation/Prior intimation_Board meeting to be held on 10.11.2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Prior Intimation of Board Meeting_30.05.2026</span>
                    <a href="upload/fpar/board_meeting_intimation/Prior Intimation of Board Meeting_30.05.2026.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Prior Intimation for Board Meeting</span>
                    <a href="upload/fpar/board_meeting_intimation/Prior Intimation for Board Meeting.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

          <!-- 3. Credit Rating -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-target="#creditRating"
              aria-expanded="false"
              role="button"
              tabindex="0"
            >
              <h4>
                <i
                  class="fa fa-star"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Financial Results
              </h4>
              <span class="toggle-icon"><i class="fa fa-chevron-down"></i></span>
            </div>
            <div id="creditRating" class="financial-collapse">
              <div class="card-body-banking">
                <!-- Report List -->
                <div class="report-list-container">
                  <div class="report-item">
                    <span class="report-title">Quartrly and Half Yearly Results_ September 30,2025</span>
                    <a href="upload/fpar/financial_results/Quartrly and Half Yearly Results_ September 30,2025.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Quarterly financial Result_December 2025</span>
                    <a href="upload/fpar/annual_report/Limited Reviw Report Final.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Financial Results as on June 30, 2026</span>
                    <a href="upload/fpar/financial_results/Financial Results as on June 30, 2026.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Financials_2024-25</span>
                    <a href="upload/fpar/financial_results/Financials_2024-25.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Financials_2023-24</span>
                    <a href="upload/fpar/financial_results/Financials_2023-24.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  <div class="report-item">
                    <span class="report-title">Financials_2022-23</span>
                    <a href="upload/fpar/financial_results/Financials_2022-23.pdf" target="_blank">
                      <i class="fa fa-file-pdf-o pdf-icon"></i>
                    </a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Interactive Scripts for Mobile Accordion, Row Clicks & Live Search -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var cardHeaders = document.querySelectorAll(".card-header-banking");
        var reportItems = document.querySelectorAll(".report-item");
        var searchInput = document.getElementById("disclosureSearch");
        var clearBtn = document.getElementById("clearSearchBtn");
        var counterBadge = document.getElementById("searchCounterBadge");

        // 1. Calculate & append document counts to each card header
        document.querySelectorAll(".financial-card").forEach(function (card) {
          var items = card.querySelectorAll(".report-item");
          var header = card.querySelector(".card-header-banking");
          if (header && items.length > 0) {
            var metaWrap = document.createElement("div");
            metaWrap.className = "header-right-meta";

            var countPill = document.createElement("span");
            countPill.className = "doc-count-pill";
            countPill.textContent = items.length + (items.length === 1 ? " Document" : " Documents");

            var toggleIcon = header.querySelector(".toggle-icon");
            if (toggleIcon) {
              header.insertBefore(metaWrap, toggleIcon);
              metaWrap.appendChild(countPill);
              metaWrap.appendChild(toggleIcon);
            }
          }
        });

        // 2. Silky Smooth Accordion Toggle Logic
        function toggleSection(header, forceOpen) {
          var targetSelector = header.getAttribute("data-target") || header.getAttribute("href");
          if (!targetSelector) return;
          var targetBody = document.querySelector(targetSelector);
          if (!targetBody) return;

          var isCurrentlyOpen = header.getAttribute("aria-expanded") === "true";
          var willOpen = (forceOpen !== undefined) ? forceOpen : !isCurrentlyOpen;

          if (willOpen) {
            header.setAttribute("aria-expanded", "true");
            targetBody.classList.add("is-open");
          } else {
            header.setAttribute("aria-expanded", "false");
            targetBody.classList.remove("is-open");
          }
        }

        cardHeaders.forEach(function (header) {
          header.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();
            toggleSection(header);
          });

          header.addEventListener("keydown", function (e) {
            if (e.key === "Enter" || e.key === " ") {
              e.preventDefault();
              toggleSection(header);
            }
          });
        });

        // 3. Make whole row touch-friendly / clickable on mobile
        reportItems.forEach(function (item) {
          var link = item.querySelector("a");
          if (link) {
            item.addEventListener("click", function (e) {
              if (e.target.closest("a")) return;
              link.click();
            });
          }
        });

        // 4. Live Search & Filtering
        if (searchInput) {
          searchInput.addEventListener("input", function () {
            var query = this.value.trim().toLowerCase();

            if (clearBtn) {
              clearBtn.style.display = query.length > 0 ? "flex" : "none";
            }

            var totalMatched = 0;
            var cardsMatched = 0;

            document.querySelectorAll(".financial-card").forEach(function (card) {
              var items = card.querySelectorAll(".report-item");
              var cardMatches = 0;
              var header = card.querySelector(".card-header-banking");

              items.forEach(function (item) {
                var titleText = item.querySelector(".report-title") ? item.querySelector(".report-title").textContent.toLowerCase() : "";
                if (query === "" || titleText.indexOf(query) !== -1) {
                  item.style.display = "";
                  cardMatches++;
                  totalMatched++;
                } else {
                  item.style.display = "none";
                }
              });

              if (query === "") {
                card.style.display = "";
                var isFirst = (card === document.querySelector(".financial-card"));
                if (header) toggleSection(header, isFirst);
              } else {
                if (cardMatches > 0) {
                  card.style.display = "";
                  cardsMatched++;
                  if (header) toggleSection(header, true);
                } else {
                  card.style.display = "none";
                  if (header) toggleSection(header, false);
                }
              }
            });

            if (counterBadge) {
              if (query.length > 0) {
                counterBadge.style.display = "block";
                counterBadge.textContent = "Found " + totalMatched + (totalMatched === 1 ? " document" : " documents") + " in " + cardsMatched + (cardsMatched === 1 ? " category" : " categories");
              } else {
                counterBadge.style.display = "none";
              }
            }
          });
        }

        if (clearBtn) {
          clearBtn.addEventListener("click", function () {
            if (searchInput) {
              searchInput.value = "";
              searchInput.dispatchEvent(new Event("input"));
              searchInput.focus();
            }
          });
        }
      });
    </script>
    
    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>      
   


    <?php
    $conn->close();
    ?>
</body>
</html>