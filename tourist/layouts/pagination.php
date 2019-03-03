<?php
  // how many records should be displayed on a page?
  $records_per_page = (!empty($paginations['records_per_page'])) ? $paginations['records_per_page'] : 15;

  // instantiate the pagination object
  $pagination = new Zebra_Pagination();

  // the number of total records is the number of records in the array
  $pagination->records(count($res));

  // records per page
  $pagination->records_per_page($records_per_page);

  // here's the magic: we need to display *only* the records for the current page
  $res = array_slice(
      $res,
      (($pagination->get_page() - 1) * $records_per_page),
      $records_per_page
  );

