<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>INVOICE</title>
</head>

<style>
   .wikitable tbody tr th, table.jquery-tablesorter thead tr th.headerSort, .header-cell {
   background: #009999;
   color: white;
   /* font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace; */
   font-weight: bold;
   font-size: 13pt;
   }
   .wikitable, table.jquery-tablesorter {
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
   }
   .tabela, .wikitable {
   border: 1px solid #A2A9B1;
   border-collapse: collapse; 
   }
   .tabela tbody tr td, .wikitable tbody tr td {
   padding: 5px 10px 5px 10px;
   border: 1px solid #A2A9B1;
   border-collapse: collapse;
   }
   .config-value {
   /* font-family: "Courier New", Courier, "Lucida Sans Typewriter", "Lucida Typewriter", monospace; */
   font-size:13pt; 
   background: white; 
   font-weight: bold;
   }
</style>

<body>
 
<div id="container">
    <h1 style="text-align: center">INVOICE</h1>
    <div id="body">
        <table style="width: 100%">
            <tr>
                <td style="width: 50%">
                    <table>
                        <tr>
                            <td>KEPADA YTH:</td>
                        </tr>
                        <tr>
                            <td>PT. Toyoplas</td>
                        </tr>
                        <tr>
                            <td>Jl. Trembesi</td>
                        </tr>
                    </table>
                </td>
                <td style="width: 50%; text-align:right">
                    <table>
                        <tr>
                            <td colspan="3">Data FRP</td>
                        </tr>
                        <tr>
                            <td>Invoice No</td>
                            <td>:</td>
                            <td>00183/INV/APP/10/2022</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>11 Oktober 2022</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>
        <table class="wikitable tabela" style="width: 100%">
            <tbody>
                <tr>
                    <th>No</th>
                    <th>Part Name</th>
                    <th>DO</th>
                    <th>Qty</th>
                    <th>Unit</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Tray HH-20</td>
                    <td>2235</td>
                    <td>1,575</td>
                    <td>pcs</td>
                    <td>7,000</td>
                    <td>11,025,000</td>
                </tr>
                <tr>
                    <td colspan="5">PO No. : 21002064</td>
                    <td>Sub Total</td>
                    <td>11,025,000</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Ppn</td>
                    <td>11,025,000</td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                    <td>Grand Total</td>
                    <td>11,025,000</td>
                </tr>
            </tbody>
        </table>

        <br>
        <br>
        Pembayaran dapat memakai Bilyet Giro/ Cek  <br>
        Atau melalui transfer Rekening berikut: <br>
        Bank BCA : 066327118<br>
        Bank BNI : 1438758981<br>
        A/n PT. Anugerah Prima Plasindo <br>

        <br>
        <strong>PT. Anugerah Prima Plasindo</strong>
    </div>
</div>

</body>
</html>