# 🍖 BIP Eater
BIP is a Population Main Book containing population data in a certain area in Indonesia. This application is able to parse BIP documents in excel or pdf format into JSON. Then input the JSON results into a MySQL-based application database. Thus, this application is capable of performing operations and manipulating population data of Indonesian citizens completely from the BIP document uploaded to this application.

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Core Concept
<img src="https://gopa.koonek.net/public/cdn/BIPEaterDiagram.png">

## Technology
- <b>PHP</b> <code>v8.0.22</code>
- <b>Laravel</b> <code>v9.28.0</code>
- <b>Bootstrap</b> <code>v5.2</code>
- <b>Livewire</b> <code>v2.10.7</code>

## API Dependencies
- BPS API with endpoint: https://webapi.bps.go.id/v1/api
- Kode Wilayah with endpoint: https://dev.farizdotid.com/api/daerahindonesia
- Google Maps Embedded with endpoint: https://maps.google.com/maps?q={{$details->loc}}&output=embed
- Data Wilayah Administratif with: https://github.com/cahyadsn/wilayah

## Supported documents that can eaten
- PDF (.pdf)
- Excel (.xlsx, .csv, .xls, .xml, .ods)

## Installation
1. Write this <code>composer require phpoffice/phpspreadsheet</code> in your terminal to install PHPSpreadsheet plugin in your PHP App.
2. If you want to install PHPSpreadsheet with doc then you must write <code>composer require phpoffice/phpspreadsheet --prefer-source</code>
3. Search BIP Document in .pdf or .xls (excel) format in many open sources like Scribd, Adoc, PDF Coffee, 123dok, etc. <a href="https://www.scribd.com/document/450191065/Buku-Induk-Penduduk">Like this</a>
4. Upload BIP Document that you have downloaded to Upload Section in website.
5. Wait until the website has finished processing it and enter it into the database from JSON format.
6. And voila! If the document you uploaded is really a BIP document which usually contains the following queries: id/sequence number, full name, gender, marital status, place of birth, date of birth, last education, occupation, citizenship, complete address, rt/rw, position in the family, residence registration number, and family card number.

## Demo
1. With this excel document: <a href="https://www.desapengadangan.web.id/first/unduh_dokumen_artikel/25">Click This</a>
2. You will have this output JSON: <code>
{
    "2020": [
        {
            "NOMOR URUT": "001",
            "NAMA LENGKAP": "NAHARUDIN",
            "JENIS KELAMIN": "LAKI-LAKI",
            "STATUS PERKAWINAN": "KAWIN",
            "TEMPAT LAHIR": "PENGADANGAN",
            "TANGGAL LAHIR": "01/07/1960",
            "PENDIDIKAN": "SLTA/SEDERAJAT",
            "PEKERJAAN": "WIRASWASTA",
            "KEWARGANEGARAAN": "WNI",
            "ALAMAT LENGKAP": "GUBUK TIMUK",
            "KEDUDUKAN DALAM KELUARGA": "KEPALA KELUARGA",
            "NIK": "5203120107600663",
            "NOMOR KK": "5203120411100003"
        },
        {
            "NOMOR URUT": "002",
            "NAMA LENGKAP": "SOPIATUN",
            "JENIS KELAMIN": "PEREMPUAN",
            "STATUS PERKAWINAN": "KAWIN",
            "TEMPAT LAHIR": "PRINGGASELA",
            "TANGGAL LAHIR": "01/07/1967",
            "PENDIDIKAN": "SLTA/SEDERAJAT",
            "PEKERJAAN": "WIRASWASTA",
            "KEWARGANEGARAAN": "WNI",
            "ALAMAT LENGKAP": "GUBUK TIMUK",
            "KEDUDUKAN DALAM KELUARGA": "ISTRI",
            "NIK": "5203124107671027",
            "NOMOR KK": "5203120411100003"
        }, .....
          ]
}</code>
3. And front-end view in web app is like this: <table width="40px">
    <thead>
    <tr valign="top">
        <th>NO.</th>
        <th>NOMOR KK</th>
        <th>NIK</th>
        <th>NAMA LENGKAP</th>
        <th>JENIS KELAMIN</th>
        <th>STATUS PERKAWINAN</th>
        <th>TEMPAT LAHIR</th>
        <th>TANGGAL LAHIR</th>
        <th>PENDIDIKAN</th>
        <th>PEKERJAAN</th>
        <th>KEWARGANEGARAAN</th>
        <th>ALAMAT LENGKAP</th>
        <th>KEDUDUKAN DALAM KELUARGA</th>
    </tr>
    </thead?
    <tbody>
        <tr valign="top">
          <td>001</td>
          <td>5203120411100003</td>
          <td>5203120107600663</td>          
          <td>NAHARUDIN</td>
          <td>LAKI-LAKI</td>
          <td>KAWIN</td>
          <td>PENGADANGAN</td>
          <td>01/07/1960</td>
          <td>SLTA/SEDERAJAT</td>
          <td>WIRASWASTA</td>
          <td>WNI</td>
          <td>GUBUK TIMUK</td>
          <td>KEPALA KELUARGA</td>
        </tr> 
        <tr valign="top">
          <td>002</td>
          <td>5203120411100003</td>
          <td>5203124107671027</td>          
          <td>SOPIATUN</td>
          <td>PEREMPUAN</td>
          <td>KAWIN</td>
          <td>PRINGGASELA</td>
          <td>01/07/1967</td>
          <td>SLTA/SEDERAJAT</td>
          <td>WIRASWASTA</td>
          <td>WNI</td>
          <td>GUBUK TIMUK</td>
          <td>ISTRI</td>
        </tr>
    </tbody></table>

## KK & NIK Meaning
- 5203120411100003:
    <ul>
    <li><code>52 (province) + 03 (district) + 12 (sub-district) + 041110 (record date) + 0003 (record sequence)</code></li>
    </ul>
- 5203120107600663:
    <ul>
    <li><code>52 (province) + 03 (district) + 12 (sub-district) + 010760 (birth date) + 0663 (record sequence)</code></li>
    </ul>

## Sampling
<h3><b>n = N / 1+Ne^2</b></h3>This equation is used to determine the minimum sample size in conducting research on the relationship between one variable and another. Considering that BIP Eater is capable of displaying results or a summary of the population, it is necessary to formulate this equation.

If the population in Indonesia is 275,773,800 people, then N = 275,773,800, and e = with a significance level of 95% or 0.05, then:

<b>n = 275,773,800 / 1 + 275,773,800 x 0.05^2 = 400</b>

However, I prefer a sample size of at least 10% of the total population in Indonesia with the distribution of data availability in each region (kelurahan, sub-district, city/district, and province). A minimum sample size of 10% can provide a minimum margin of error than it should be with the output based on the Solvin equation. Thus, the minimum data that must be included in this BIP Eater is 27,577,380 population data and evenly distributed in various regions in Indonesia.

## Further Development
- Integrate with https://cekbansos.kemensos.go.id/ to check citizen's data Bantuan Sosial receiver
- Integrate with https://bsu.bpjsketenagakerjaan.go.id/ to check citizen's data Subsidi Upah receiver
- Integrate with https://eform.bri.co.id/bpum to check citizen's data BPUM receiver
- Integrate with https://pddikti.kemdikbud.go.id/ to check which campus, which major, and other information related to higher education from citizens who have or are currently studying
- Integrate with https://nisn.data.kemdikbud.go.id/ to check the location where citizens go to school (outside higher education)


## Plugin & Third Parties
- https://github.com/smalot/pdfparser
- https://github.com/PHPOffice/PhpSpreadsheet
- https://github.com/PHPOffice/PHPWord
- https://github.com/jppcouto/pdf-parser-laravel
- https://apidocs.pdf.co/
- https://github.com/jaytrivedi185/Textprocessing
- https://www.creative-tim.com/product/soft-ui-dashboard-laravel-livewire
- https://github.com/OpenSID/OpenSID


## Development References
- https://blog.rosihanari.net/export-data-file-excel-ke-json-dengan-script-php/
- https://apidocs.pdf.co/13-pdf-to-json
- https://www.phpclasses.org/package/7965-PHP-Convert-data-from-Excel-spreadsheet-to-JSON-format.html
- https://levelup.gitconnected.com/how-to-convert-excel-file-into-json-object-by-using-javascript-9e95532d47c5
- https://github.com/OpenSID/OpenSID/issues/2777
