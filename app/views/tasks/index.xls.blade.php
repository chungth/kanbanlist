<?xml version="1.0" encoding="UTF-8"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
  xmlns:o="urn:schemas-microsoft-com:office:office"
  xmlns:x="urn:schemas-microsoft-com:office:excel"
  xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
  xmlns:html="http://www.w3.org/TR/REC-html40">
  <Worksheet ss:Name="Sheet1">
    <Table>
      <Row>
        <Cell><Data ss:Type="String">Book</Data></Cell>
        <Cell><Data ss:Type="String">Task</Data></Cell>
        <Cell><Data ss:Type="String">Status</Data></Cell>
        <Cell><Data ss:Type="String">UpdatedAt</Data></Cell>
      </Row>
    @foreach (['doing','todo_h','todo_m', 'todo_l', 'waiting'] as $st)
      @foreach ($tasks->by_status($st) as $t)
      <Row>
        <Cell><Data ss:Type="String">{{$t->book_name }}</Data></Cell>
        <Cell><Data ss:Type="String">{{$t->message_without_book_name }}</Data></Cell>
        <Cell><Data ss:Type="String">{{$t->statusSymbol() }}</Data></Cell>
        <Cell><Data ss:Type="String">{{strftime("%Y/%m/%d %H:%M", $t->updated_at)}}</Data></Cell>
      </Row>
      @endforeach
    @endforeach
    @foreach ($tasks->done as $t)
      <Row>
        <Cell><Data ss:Type="String">{{ $t->book_name }}</Data></Cell>
        <Cell><Data ss:Type="String">{{ $t->message_without_book_name }}</Data></Cell>
        <Cell><Data ss:Type="String">{{ $t->statusSymbol() }}</Data></Cell>
        <Cell><Data ss:Type="String">{{strftime("%Y/%m/%d %H:%M", $t->updated_at)}}</Data></Cell>
      </Row>
    @endforeach
    </Table>
  </Worksheet>
</Workbook>
