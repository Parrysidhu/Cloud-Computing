package hadoop;

import java.util.*;

import java.io.IOException;
import java.io.IOException;

import org.apache.hadoop.fs.Path;
import org.apache.hadoop.conf.*;
import org.apache.hadoop.io.*;
import org.apache.hadoop.mapred.*;
import org.apache.hadoop.util.*;

public class ProcessUnits {
   //Mapper class
   public static class E_EMapper extends MapReduceBase implements
   Mapper<LongWritable ,/*Input key Type */
   Text,                /*Input value Type*/
   Text,                /*Output key Type*/
   IntWritable>        /*Output value Type*/
   {
      //Map function
      public void map(LongWritable key, Text value,
      OutputCollector<Text, IntWritable> output,

      Reporter reporter) throws IOException {
         String line = value.toString();
         StringTokenizer s = new StringTokenizer(line,"\t");

         String stuId = s.nextToken();

         while(s.hasMoreTokens()) {
            int num = Integer.parseInt(s.nextToken());
            output.collect(new Text(stuId), new IntWritable(num));
        }
      }
   }

   //Reducer class
   public static class E_EReduce extends MapReduceBase implements Reducer< Text, IntWritable, Text, IntWritable > {

      //Reduce function
      public void reduce( Text key, Iterator <IntWritable> values,
      OutputCollector<Text, IntWritable> output, Reporter reporter) throws IOException {
         int sum = Integer.MIN_VALUE;
         while (values.hasNext()) {
            IntWritable i = values.next();
            sum += i.get();
        }
         output.collect(key, new IntWritable(sum));
      }
   }

   //Main function
   public static void main(String args[])throws Exception {
      JobConf conf = new JobConf(ProcessUnits.class);

      conf.setJobName("max_eletricityunits");
      conf.setOutputKeyClass(Text.class);
      conf.setOutputValueClass(IntWritable.class);
      conf.setMapperClass(E_EMapper.class);
      conf.setCombinerClass(E_EReduce.class);
      conf.setReducerClass(E_EReduce.class);
      conf.setInputFormat(TextInputFormat.class);
      conf.setOutputFormat(TextOutputFormat.class);

      FileInputFormat.setInputPaths(conf, new Path(args[0]));
      FileOutputFormat.setOutputPath(conf, new Path(args[1]));

      JobClient.runJob(conf);
   }
}