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
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />

    <!-- Font Awesome for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <style>
      :root {
        --primary-color: #006eae;
        --secondary-color: #007cc4;
        --accent-color: #00a859;
        --light-bg: #f8f9fa;
        --border-color: #e0e0e0;
        --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
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
        padding: 25px 30px;
        border-bottom: 5px solid var(--accent-color);
      }

      .banking-header h1 {
        font-size: 32px;
        font-weight: 600;
        margin: 0 0 5px 0;
      }

      .banking-header .subtitle {
        font-size: 16px;
        opacity: 0.9;
        margin-bottom: 0;
      }

      .tab-content-banking {
        max-width: 1200px;
        padding: 30px;
        margin: 0 auto;
      }

      .section-title {
        color: var(--primary-color);
        font-size: 24px;
        font-weight: 600;
        margin-top: 0;
        margin-bottom: 25px;
        padding-bottom: 12px;
        border-bottom: 2px solid #f0f0f0;
      }

      .financial-card {
        background: white;
        border-radius: 8px;
        border: 1px solid var(--border-color);
        overflow: hidden;
        transition: transform 0.3s, box-shadow 0.3s;
        margin-bottom: 15px;
      }

      .financial-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
      }

      .card-header-banking {
        background-color: #f8fafd;
        padding: 18px 25px;
        border-bottom: 1px solid var(--border-color);
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none !important; /* Extra safety */
      }
      
      .card-header-banking:hover, .card-header-banking:focus {
          text-decoration: none !important;
          background-color: #f0f4f8;
      }

      .card-header-banking h4 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
        color: #333;
        display: flex;
        align-items: center;
      }

      .toggle-icon {
        font-size: 20px;
        font-weight: 300;
        color: #666;
        transition: transform 0.3s;
        margin-left: 10px;
      }

      .card-header-banking[aria-expanded="true"] .toggle-icon {
        transform: rotate(45deg);
        color: var(--accent-color);
      }

      .card-body-banking {
        padding: 25px;
      }

      .report-list-container {
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid #eee;
        border-radius: 6px;
      }

      .report-item {
        padding: 15px 20px;
        border-bottom: 1px solid #f0f0f0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background-color 0.2s;
        gap: 15px;
      }

      .report-item:hover {
        background-color: #f9fbfe;
      }

      .report-item:last-child {
        border-bottom: none;
      }

      /* Responsive Text Handling */
      .report-title {
        font-weight: 500;
        color: #333;
        flex: 1;
        word-break: break-word;
        padding-right: 10px;
      }

      .pdf-icon {
        color: #e74c3c;
        font-size: 20px;
        flex-shrink: 0;
      }

      .footer-info {
        background-color: #f8fafd;
        padding: 20px;
        border-radius: 6px;
        margin-top: 30px;
        font-size: 14px;
        color: #555;
        border-left: 4px solid var(--accent-color);
      }

      /* RESPONSIVE MEDIA QUERIES */
      @media (max-width: 768px) {
        .banking-header {
          padding: 20px 15px;
        }

        .banking-header h1 {
          font-size: 24px;
        }
        
        .banking-header .subtitle {
          font-size: 14px;
        }

        .tab-content-banking {
          padding: 15px;
        }
        
        .card-header-banking {
            padding: 15px;
        }
        
        .card-header-banking h4 {
            font-size: 16px;
        }
        
        .card-body-banking {
            padding: 15px;
        }
        
        .report-item {
            padding: 12px 15px;
        }
        
        .breadcumb-area {
            padding: 30px 0;
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
                <div class="britcam-shape">
                    <div class="breadcumb-content upp">
                        <ul>
                            <li><a href="/">Investor Corner</a></li>
                            <li>Financial Performance & Annual Report</li>
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
        <div role="tabpanel" class="tab-pane fade in active" id="disclosure-main">
          <h2 class="section-title">Financial Performance & Annual Report</h2>

          <!-- 1. Annual Return -->
          <div class="financial-card">
            <div
              class="card-header-banking"
              data-toggle="collapse"
              href="#annualReturn"
              aria-expanded="true"
              aria-controls="annualReturn"
            >
              <h4>
                <i
                  class="fa fa-file-text"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Annual Report
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="annualReturn" class="collapse in">
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
                    <a href="upload/fpar/annual_report/annual_report_2025-26.pdf" target="_blank">
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
              data-toggle="collapse"
              href="#corporateGovernance"
              aria-expanded="false"
              aria-controls="corporateGovernance"
            >
              <h4>
                <i
                  class="fa fa-sitemap"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Board Meeting Intimation
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="corporateGovernance" class="collapse">
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
              data-toggle="collapse"
              href="#creditRating"
              aria-expanded="false"
              aria-controls="creditRating"
            >
              <h4>
                <i
                  class="fa fa-star"
                  style="margin-right: 10px; color: var(--accent-color)"
                ></i>
                Financial Results
              </h4>
              <span class="toggle-icon">+</span>
            </div>
            <div id="creditRating" class="collapse">
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

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
      $(document).ready(function () {
        // Remove the filter button animation code since filters are removed
      });
    </script>
    <!--==================================================-->
    
    <!--------------------------------------------------->
    <?php include 'footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>      
   


    <?php
    $conn->close();
    ?>
</body>
</html>